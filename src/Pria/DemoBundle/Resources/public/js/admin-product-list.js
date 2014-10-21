$(document).ready(function(){
    "use strict";

    var patterns = {
        name        : /^[a-z0-9_-]{8,16}$/,
        description : /^[a-z0-9_-]{5,100}$/,
        url         : /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/
    };

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
        validate: function (attrs) {
            var errors = [];
            if (!patterns.name.test(attrs.name)) {
                errors.push({name: 'name', message: 'Please fill name field.'});
            }
            if (!patterns.description.test(attrs.description)) {
                errors.push({name: 'name', message: 'Please fill description field.'});
            }
            if (!patterns.url.test(attrs.externalLink)) {
                errors.push({name: 'name', message: 'Please fill external link field.'});
            }
            return errors.length > 0 ? errors : false;
        }
    });

    var ProductView = Backbone.View.extend({
        initialize: function() {
            this.model.on('change', this.update, this);
            this.template = _.template( $('#productItem').html() );
        },
        update : function(){
            console.log('ProductView:update');
            this.$el.html(this.template(this.model.toJSON()));
        },
        render: function() {
            console.log('ProductView:render');
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        events:{
            "click #show"   :   "showProduct",
            "click #edit"   :   "editProduct",
            "click #delete" :   "deleteProduct"
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
            products.removeOne(this);
        }
    });

    var ProductDetailView = Backbone.View.extend({
        initialize: function(){

        },
        render: function(){
            var template = _.template( $("#productItemDetail").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        }
    });

    var ProductEditView = Backbone.View.extend({
        initialize: function(){

        },
        render: function(){
            console.log("ProductEditView:Edit:" + this.model.toJSON().id);
            var template = _.template( $("#productItemEdit").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        },
        events:{
            "click #update" : "updateProduct",
            "click #new"    : "newProductView"
        },
        newProductView: function(e){
            e.preventDefault();
            $('#product-crud-holder').html( new ProductNewView().render().el);
        },
        updateProduct: function(e){
            e.preventDefault();
            var name = $('#name').val();
            var description = $('#description').val();
            var imageThumb = this.model.get('imageThumb');
            var imageBig = this.model.get('imageBig');
            var externalLink = $('#externalLink').val();
            var obj = { name         : name,
                description  : description,
                imageThumb   : imageThumb,
                imageBig     : imageBig,
                externalLink : externalLink };

            var feedback = {
                success: function () {
                    console.log('ProductEditView:Product:Update:Succeed');
                },
                error: function (model, error) {
                    console.log('ProductEditView:Product:Update:Failed');
                    console.log(error);
                },
                wait: true
            };

            var valid = this.model.save(obj, feedback);
            if(!valid) {
                console.log('ProductEditView:Product:Update:IsValid');
            } else {
                valid.complete(function() {
                    console.log('ProductEditView:Product:Update:Valid');
                });
            }
        }
    });

    var ProductNewView = Backbone.View.extend({
        initialize: function(){

        },
        render: function(){
            var template = _.template( $("#productItemNew").html(), {} );
            this.$el.html( template() );
            return this;
        },
        events:{
            "click #save"   :   "createProduct"
        },
        createProduct: function(){
            var name = $('#name').val();
            var description = $('#description').val();
            var imageThumb = '9UoMqWLnKEzK1R.jpg';
            var imageBig = '9UoMqWLnKEzK1R.jpg';
            var externalLink = $('#externalLink').val();
            var obj = { name         : name,
                description  : description,
                imageThumb   : imageThumb,
                imageBig     : imageBig,
                externalLink : externalLink };

            var feedback = {
                success: function () {
                    console.log('ProductNewView:Product:Create:Succeed');
                },
                error: function (model, error) {
                    console.log('ProductNewView:Product:Create:Failed');
                    console.log(error);
                },
                wait: true
            };

            var product = new Product();
            var valid = product.save(obj, feedback);
            if(!valid) {
                console.log('ProductNewView:Product:Create:IsValid');
            } else {
                valid.complete(function(response, status) {
                    if (status) {
                        console.log('ProductNewView:Product:Create:Valid');
                        products.add(product);
                    }
                });
            }
        }
    });

    var Products = Backbone.Collection.extend({
        model: Product,
        url: '../../api/v1/product/',
        initialize: function() {

        },
        parse: function(data) {
            return data.products;
        },
        removeOne : function(product){
            console.log('Products:removeOne');
            product.model.destroy({
                success: function() {
                    console.log('ProductView:Product:destroy:Succeed');
                    product.remove();
                    product.unbind();
                }
            });
        }
    });

    var ProductsView = Backbone.View.extend({
        initialize: function() {
            this.collection.bind("add", this.addOne, this);
        },
        addOne: function(product) {
            console.log('ProductsView:addOne');
            this.$el.prepend(new ProductView({ model: product }).render().el);
        },
        render: function(){
            return this;
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