(function () {
    'use strict';

    ACMESTORE.product.cart = function () {
        var Stripe = StripeCheckout.configure({
            key: $('#properties').data('stripe-key'),
            locale: "auto",
            token: function(token){
                var data = $.param({
                    stripeToken: token.id,
                    stripeEmail: token.email
                })
                axios.post('/cart/payment',data).then(function(response){
                    $(".notify").css("display", 'block').delay(4000).slideUp(300)
                    .html(response.data.success);
                    app.displayItems();
                }).catch(function(error){
                    console.log(error)
                })
            }
        })
        var app = new Vue({
           el: '#shopping_cart',
           data: {
               items: [],
               cartTotal: [],
               loading: false,
               fail: false,
               message: '',
               amount: 0
            },
            methods: {
               displayItems: function () {
                    this.loading = true;
                    axios.get('/cart/items').then(function (response) {
                           if(response.data.fail){
                               app.fail = true;
                               app.message = response.data.fail;
                               app.loading = false;
                           }else{
                               app.items = response.data.items;
                               app.cartTotal = response.data.cartTotal;
                               app.loading = false;
                               app.amount = response.data.amount;
                           }
                       });
               },
               updateQuantity: function (product_id, operator) {
                   var postData = $.param({product_id:product_id, operator:operator});
                   axios.post('/cart/update-qty', postData).then(function () {
                       app.displayItems();
                       app.paypalCheckout();
                   })
               },
               removeItem: function (index) {
                    var postData = $.param({item_index:index});
                    axios.post('/cart/remove-item', postData).then(function (response) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(response.data.success);
                        app.displayItems();
                        app.paypalCheckout();
                    })
                },
                emptyCart: function(){
                    axios.post('/cart/empty-cart').then(function (response) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(response.data.success);
                        app.displayItems();
                    })
                },
                checkout: function(){
                    Stripe.open({
                        name: "Store",
                        description: "Shopping Cart Items",
                        email: $('#properties').data('customer-email'),
                        amount: app.amount,
                        zipCode:true
                    })
                },
                paypalCheckout: function(){
                    setTimeout(function(){
                        var payPalInfo = $('#paypalInfo');
                        var baseUrl = payPalInfo.data('app-baseurl')
                        var environment = payPalInfo.data('app-env')
                        var env = 'sandbox'
                        if(environment === 'production'){
                            env = 'production'
                        }
                        var CREATE_PAYMENT_ROUTE = baseUrl + 'paypal/create-payment'
                        var EXECUTE_PAYMENT_ROUTE = baseUrl + 'paypal/execute-payment'
                        paypal.Button.render({
                            // Configure environment
                            env: env,

                            client: {
                              sandbox: 'demo_sandbox_client_id',
                              production: 'demo_production_client_id'
                            },
                            // Customize button (optional)
                            locale: 'en_US',
                            style: {
                              size: 'medium',
                              color: 'gold',
                              shape: 'pill',
                            },
                        
                            // Enable Pay Now checkout flow (optional)
                            commit: true,
                        
                            // Set up a payment
                            payment: function(data) {
                             return paypal.request.post(CREATE_PAYMENT_ROUTE).then(function(data){
                                return data.id
                             })
                            },
                            // Execute the payment
                            onAuthorize: function(data) {
                                console.log(data)
                              return paypal.request.post(EXECUTE_PAYMENT_ROUTE,{
                                paymentId: data.paymentId,
                                payerId: data.payerID,
                              }).then(function(response){
                                $(".notify").css("display", 'block').delay(4000).slideUp(300)
                                .html(response.success);
                                app.emptyCart();
                                app.paypalCheckout();
                              })
                            }
                          }, '#paypalBtn');
                    },500)
                }
            },
            created: function(){
                this.displayItems();
            },
            mounted: function(){
                this.paypalCheckout();
            }      
        });
    };
})();