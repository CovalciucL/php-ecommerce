(function(){
    'use strict';

    ACMESTORE.product.details = function(){
        var app = new Vue({
            el: '#product',
            data: {
                product: [],
                category: [],
                subCategory: [],
                similarProducts: [],
                productId: $('#product').data('id'),
                loading: false
            },
            methods:{
                getProductDetails: function(){
                    this.loading = true;
                    axios.get('/product-details/' + this.productId)
                    .then(function(response){
                            app.product = response.data.product;
                            app.category = response.data.category;
                            app.subCategory = response.data.subCategory;
                            app.similarProducts = response.data.similarProducts;
                            app.loading = false;
                        });
                    },
                    stringLimit: function(string, value){
                       return ACMESTORE.module.truncateString(string,value)
                    },
                    addToCart: function(id){
                        ACMESTORE.module.addItemToCart(id,function(message){
                            $(".notify").css("display", "block").delay(4000).slideUp(300).html(message)
                        });
                    },
                },
                created: function(){
                    this.getProductDetails();
                }
        });
    }
})();