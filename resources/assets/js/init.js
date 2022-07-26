(function (){
    'use strict'

    $(document).foundation();

    $(document).ready(function(){
        switch ($("body").data("page-id")){
            case 'home':
                ACMESTORE.homeslider.initCarousel();
                ACMESTORE.homeslider.homePageProducts();
                break;
            case 'cart':
                ACMESTORE.product.cart()
                break;
            case 'product':
                ACMESTORE.product.details();
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                ACMESTORE.admin.delete();
                ACMESTORE.admin.create();
                break;
            case 'adminProduct':
                ACMESTORE.admin.changeEvent();
                ACMESTORE.admin.delete();
                break;
            case 'adminDashboard':
                ACMESTORE.admin.dashboard();
                break;
            case 'products':
            case 'categories':
                ACMESTORE.products.display();
                break;    
            default:  
        }
    });
})();