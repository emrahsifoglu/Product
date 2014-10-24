$(document).ready(function(){
    "use strict";

    var Product = Backbone.Model.extend({
        defaults:{
            id:null,
            name:'',
            description:'',
            image_big:'',
            image_thumb:'',
            external_link:''
        },
        urlRoot: 'api/v1/product/',
        url: function() {
            return this.urlRoot + this.id;
        },
        initialize: function(){
            // initialize
        }
    });

    var ProductView = Backbone.View.extend({
        events:{
            "click .show" : "showProduct"
        },
        initialize: function() {
            this.template = _.template( $('#productItem').html() );
        },
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        showProduct:function () {
            var productDetailView = new ProductDetailView({ model: this.model });
            $('#product-detail-holder').html(productDetailView.render().el);
        }
    });

    var ProductDetailView = Backbone.View.extend({
        initialize: function(){
            //this.render(); ? Do we have to use it?
        },
        render: function(){
            var template = _.template( $("#productItemDetail").html(), {} );
            this.$el.html( template(this.model.toJSON()) );
            return this;
        }
    });

    var Products = Backbone.Collection.extend({
        model: Product,
        url: 'api/v1/product/',
        parse: function(data) {
            return data.products;
        }
    });

    var ProductsView = Backbone.View.extend({
        initialize: function() {

        },
        render: function() {
            this.collection.each(function(product){
                this.prependNewProduct( product );
            }, this);
            return this;
        },
        prependNewProduct: function( product ) {
            this.$el.prepend(new ProductView({ model: product }).render().el);
        }
    });

    var products = new Products();
    var productsView = new ProductsView({ collection: products });

    products.fetch({
        success: function(collection) {
            $('#product-list').html(productsView.render().el);
        }
    });
});