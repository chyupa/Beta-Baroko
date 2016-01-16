(function () {
    'use strict';

    angular
        .module('baroko.front', [
            'ngAnimate',
            'toastr'
        ])
        .constant('endpoints', {
            BACK: {
                GET_PRODUCTS: 'api/getPublicProducts',
                GET_PRODUCT: 'api/getProduct'
            }
        });

})();