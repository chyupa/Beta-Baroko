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
                GET_PRODUCT: 'api/getProduct/',

                ADD_TO_CART: 'api/addToCart',
                GET_CART_CONTENTS: 'api/getCartContents'
            }
        })
        .constant('extensions', {
            SINGLE: {
                METRU: 'metru',
                BUCATA: 'bucata'
            },
            PLURAL: {
                METRU: 'metrii',
                BUCATA: 'bucati'
            }
        });

})();