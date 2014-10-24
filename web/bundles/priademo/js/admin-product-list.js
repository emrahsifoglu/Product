$(document).ready(function(){
    "use strict";

    var vent = _.extend({}, Backbone.Events);

    var Product = Backbone.Model.extend({
        urlRoot: '../../api/v1/product/',
        idAttribute: "id",
        defaults: {
            id: null,
            name         : "",
            description  : "",
            imageThumb   : "",
            imageBig     : "",
            externalLink : ""
        },
        url:function () {
            var base = this.urlRoot || (this.collection && this.collection.url) || "/";
            if (this.isNew()) return base;
            return base + encodeURIComponent(this.id);
        },
        initialize : function() {
            this.on("invalid",function(model, errors){
                console.log('Product:Model:on:invalid');
                errors.forEach(function(error) {
                    console.log(error.message);
                });
            });
            this.on('error', function(model, error){
                console.log('Product:on:error');
            });
        },
        validate: function (attrs) { //https://github.com/thedersen/backbone.validation
            var errors = [];
            var patterns = {
                name        : /^[a-zA-Z0-9_-]{5,15}$/,
                url         : /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/
            };

            if (!patterns.name.test(attrs.name)) {
                errors.push({name: 'name', message: 'Please fill name field.'});
            }
            if (attrs.description.length < 5 || attrs.description.length > 100) {
                errors.push({name: 'name', message: 'Please fill description field.'});
            }
            if (!patterns.url.test(attrs.externalLink)) {
                errors.push({name: 'name', message: 'Please fill external link field.'});
            }
            if (!attrs.imageThumb) { // looking for a proper expressions
                errors.push({name: 'imageThumb', message: 'Please select an image field.'});
            }
            return errors.length > 0 ? errors : false;
        }
    });

    var ProductView = Backbone.View.extend({
        events:{
            "click #show"   :   "showProduct",
            "click #edit"   :   "editProduct",
            "click #delete" :   "deleteProduct"
        },
        initialize: function() {
            _.bindAll(this, 'render', 'updateProduct', 'showProduct', 'editProduct', 'deleteProduct');
            this.model.on('changed', this.updateProduct, this);
            this.template = _.template( $('#productItem').html() );
        },
        render: function() {
            console.log('ProductView:render');
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        updateProduct : function(){
            console.log('ProductView:update');
            this.$el.html(this.template(this.model.toJSON()));
        },
        showProduct: function (e) {
            e.preventDefault();
            var productDetailView = new ProductDetailView({ model: this.model });
            $('#product-crud-holder').html(productDetailView.render().el);
        },
        editProduct: function (e) {
            e.preventDefault();
            var productEditView = new ProductEditView({ model: this.model });
            $('#product-crud-holder').html(productEditView.render().el);
        },
        deleteProduct: function (e) {
            e.preventDefault();
            if (confirm("Are you sure that you want to permanently delete this?")){
                console.log('ProductView:deleteProduct');
                $('#product-crud-holder').html( new ProductNewView().render().el);
                products.removeOne(this);
            }
        }
    });

    var ProductDetailView = Backbone.View.extend({
        initialize: function(){
            _.bindAll(this, 'render');
        },
        render: function(){
            var template = _.template( $("#productItemDetail").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        }
    });

    var ProductEditView = Backbone.View.extend({
        events:{
            "click #update" : "updateProduct",
            "click #new"    : "newProduct"
        },
        initialize: function(){
            _.bindAll(this, 'render', 'setupFileBrowser', 'newProduct', 'updateProduct');
        },
        render: function(){
            console.log("ProductEditView:Edit:" + this.model.toJSON().id);
            var template = _.template( $("#productItemEdit").html(), {} );
            this.$el.html( template(this.model.toJSON()));
            this.setupFileBrowser();
            return this;
        },
        setupFileBrowser: function(){
            console.log('setupFileBrowser');
            fileBrowser(this);
        },
        newProduct: function(e){
            e.preventDefault();
            $('#product-crud-holder').html( new ProductNewView().render().el);
        },
        updateProduct: function(e){
            e.preventDefault();
            var isFileSelected = false;
            var product = this.model;
            var frm  = this.$("#frmEdit");
            var update = $("#update");
            var name = $('#name').val();
            var description = $('#description').val();
            var externalLink = $('#externalLink').val();
            var imageThumb = $("#image_file").val();
            var currentImageThumb = product.get('imageThumb');
            var obj = { name         : name,
                        description  : description,
                        externalLink : externalLink };

            if (imageThumb != "") {
                isFileSelected = true;
                obj.imageThumb = imageThumb;
            } else {
                obj.imageThumb = currentImageThumb;
            }

            var valid = product.set(obj, { validate: true }, { silent:true });
            if (!valid){
                console.log('ProductEditView:Product:Update:IsValid');
            } else {
                if (isFileSelected){
                    vent.on( "FileUpload", function(param){
                        var status = param.status;
                        switch(status){
                            case 'beforeSend' : update.attr("disabled", "disabled"); break;
                            case 'uploadProgress' : console.log(param.percentComplete); break;
                            case 'success' :
                                obj = { imageThumb : param.filename.imageThumb, imageBig : param.filename.imageBig };
                                product.save(obj, {
                                    success: function () {
                                        console.log('ProductEditView:Product:Update:Succeed');
                                        product.trigger('changed');
                                    },
                                    error: function (model, error) {
                                        console.log('ProductEditView:Product:Update:Failed');
                                        console.log(error);
                                    },
                                    wait: true
                                }); // to force to save.
                                break;
                            case 'error' : break;
                            case 'complete' :
                                update.removeAttr("disabled");
                                vent.off( "FileUpload");
                                break;
                        }
                    });
                    fileUpload(frm, vent);
                    frm.submit();
                } else {
                    product.save(obj, {
                        beforeSend : function(){
                            update.attr("disabled", "disabled");
                        },
                        success: function () {
                            console.log('ProductEditView:Product:Update:Succeed(Image is kept same)');
                            product.trigger('changed');
                        },
                        error: function (model, error) {
                            console.log('ProductEditView:Product:Update:Failed(Image is kept same)');
                            console.log(error);
                        },complete :function(){
                            update.removeAttr("disabled");
                        },
                        wait: true
                    });
                }
            }
        }
    });

    var ProductNewView = Backbone.View.extend({
        events:{
            "click #save" : "createProduct"
        },
        initialize: function(){
            _.bindAll(this, 'render', 'setupFileBrowser', 'createProduct', 'setupFileBrowser');
        },
        render: function(){
            var template = _.template( $("#productItemNew").html(), {} );
            this.$el.html( template() );
            this.setupFileBrowser();
            return this;
        },
        setupFileBrowser: function(){
            console.log('setupFileBrowser');
            fileBrowser(this);
        },
        createProduct: function(){
            var frm  = this.$("#frmNew");
            var save = $("#save");
            var name = $('#name').val();
            var description = $('#description').val();
            var externalLink = $('#externalLink').val();
            var imageThumb = $("#image_file").val();
            var obj = { name         : name,
                        description  : description,
                        externalLink : externalLink,
                        imageThumb   : imageThumb };
            var product = new Product();
            var valid = product.set(obj, { validate: true });
            if(!valid) {
                console.log('ProductNewView:Product:Create:IsValid');
            } else {
                vent.on( "FileUpload", function(param){
                    var status = param.status;
                    switch(status){
                        case 'beforeSend' : save.attr("disabled", "disabled"); break;
                        case 'uploadProgress' : console.log(param.percentComplete); break;
                        case 'success' :
                            obj.imageThumb = param.filename.imageThumb;
                            obj.imageBig = param.filename.imageBig;
                            product.save(obj, {
                                success: function () {
                                    console.log('ProductNewView:Product:Create:Succeed');
                                    products.add(product);
                                },
                                error: function (model, error) {
                                    console.log('ProductNewView:Product:Create:Failed');
                                    console.log(error);
                                },
                                wait: true
                            });
                            break;
                        case 'error' : break;
                        case 'complete' :
                            save.removeAttr("disabled");
                            vent.off( "FileUpload");
                            break;
                    }
                });
                fileUpload(frm, vent);
                frm.submit();
            }
        }
    });

    var Products = Backbone.Collection.extend({
        model: Product,
        url: '../../api/v1/product/',
        initialize: function() {
            _.bindAll(this, 'parse', 'removeOne');
        },
        parse: function(data) {
            return data.products;
        },
        removeOne : function(productView){
            console.log('Products:removeOne');
            productView.model.destroy({
                success: function(model, response) {
                    console.log('ProductView:Product:destroy:Succeed');
                    productView.remove();
                    productView.unbind();
                }
            });
        }
    });

    var ProductsView = Backbone.View.extend({
        initialize: function() {
            _.bindAll(this, 'render', 'addOne');
            this.collection.bind("add", this.addOne, this);
        },
        render: function(){
            return this;
        },
        addOne: function(product) {
            console.log('ProductsView:addOne');
            this.$el.prepend(new ProductView({ model: product }).render().el);
        }
    });

    var products = new Products();
    var productsView = new ProductsView({ collection: products });

    products.fetch({
        success: function(collection) {
            $('#product-list').html(productsView.render().el);
            $('#product-crud-holder').html( new ProductNewView().render().el);
        }
    });
});