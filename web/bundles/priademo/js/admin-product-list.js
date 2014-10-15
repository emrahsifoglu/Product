$(document).ready(function(){
    "use strict";

    var Product = Backbone.Model.extend({
        urlRoot: '../../api/v1/product/'
    });

    var ProductDetailView = Backbone.View.extend({
        initialize: function(){
            this.render();
        },
        render: function(){
            var template = _.template( $("#productItemDetail").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        }
    });

    var ProductEditView = Backbone.View.extend({
        initialize: function(){
            this.render();
        },
        render: function(){
            var template = _.template( $("#productItemEdit").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        },
        events:{
            "click #update" : "updateProduct",
            "click #new" : "newProduct"
        },
        updateProduct: function(){
            var name = $('#name').val();
            var description = $('#description').val();
            var imageThumb = this.model.get('imageThumb');
            var imageBig = this.model.get('imageBig');
            var externalLink = $('#externalLink').val();

            this.model.set({ name         : name,
                             description  : description,
                             imageThumb   : imageThumb,
                             imageBig     : imageBig,
                             externalLink : externalLink });
            this.model.save(this.model.toJSON(), {
                success: function(){
                    console.log('Product has been updated.');
                },
                error: function(){
                    console.log('Failed to update Product');
                }
            });
            return false;
        },
        newProduct: function(){
            $('#product-crud-holder').html( new ProductNewView({model: new Product()}).render().el);
        }
    });

    var ProductNewView = Backbone.View.extend({
        initialize: function(){
            this.render();
        },
        render: function(){
            var template = _.template( $("#productItemForNew").html(), {} );
            this.$el.html( template() );
            return this;
        },events:{
            "click #save"   :   "saveProduct"
        },
        saveProduct: function(){
            var name = $('#name').val();
            var description = $('#description').val();
            var imageThumb = '9UoMqWLnKEzK1R.jpg';
            var imageBig = '9UoMqWLnKEzK1R.jpg';
            var externalLink = $('#externalLink').val();
            var obj = {  name         : name,
                         description  : description,
                         imageThumb   : imageThumb,
                         imageBig     : imageBig,
                         externalLink : externalLink };

            this.model.save(obj, {
                success: function() {
                    console.log('Product has been saved.');
                    productsFetch();
                },
                error: function() {
                    console.log('Failed to save Product');
                },
                wait: true
            });
            return false;
        }
    });

    var ProductView = Backbone.View.extend({
        initialize: function() {
            this.template = _.template( $('#productItem').html() );
            this.model.on('change', this.render, this);
        },
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        events:{
            "click #show"   :   "showProduct",
            "click #edit"   :   "editProduct",
            "click #delete" :   "deleteProduct"
        },
        showProduct:function () {
            var productDetailView = new ProductDetailView({ model: this.model });
            $('#product-crud-holder').html(productDetailView.render().el);
            return false;
        },
        editProduct:function () {
            var productEditView = new ProductEditView({ model: this.model });
            $('#product-crud-holder').html(productEditView.render().el);
            return false;
        },
        deleteProduct:function () {
            this.model.destroy({
                success: function() {
                    console.log('Product has been deleted.');
                    productsFetch();
                }
            });
            return false;
        }
    });

    var Products = Backbone.Collection.extend({
        model: Product,
        url: '../../api/v1/product/',
        parse: function(data) {
            return data.products;
        }
    });

    var ProductsView = Backbone.View.extend({
        initialize: function() {

        },
        prependNewProduct: function( product ) {
            this.$el.prepend(new ProductView({ model: product }).render().el);
        },
        render: function() {
            this.collection.each(function(product){
                this.prependNewProduct( product );
            }, this);
            return this;
        }
    });

    function productsFetch(){
        var products = new Products();
        var productsView = new ProductsView({ collection: products });
        products.fetch({
            success: function(collection) {
                $('#product-list').html(productsView.render().el);
                $('#product-crud-holder').html( new ProductNewView({model: new Product()}).render().el);
            }
        });
    }

    productsFetch();
});