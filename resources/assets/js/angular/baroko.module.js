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
                GET_CART_CONTENTS: 'api/getCartContents',
                REMOVE_CART_ITEM: 'api/removeCartItem',
                UPDATE_CART_QUANTITY: 'api/updateCartQuantity',

                PLACE_ORDER: 'api/placeOrder',

                GET_CATEGORIES: 'api/getCategories',
                GET_CATEGORY: 'api/getCategory'
            },
            FRONT: {
                THANK_YOU: 'thank-you'
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