(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CartFactory', CartFactory);

    CartFactory.$inject = ['endpoints', 'toastr', '$http'];

    function CartFactory(endpoints, toastr, $http) {
        return {
            addToCart: addToCart,
            getCartContents: getCartContents
        };

        /**
         * Get product info
         *
         * @param string url
         * @returns {HttpPromise}
         */
        function addToCart(data) {
            return $http.post(endpoints.BACK.ADD_TO_CART, data)
                .then(addToCartComplete)
                .catch(addToCartFailed)

            /**
             * success callback
             *
             * @param response
             * @returns {*}
             */
            function addToCartComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function addToCartFailed(response) {
                toastr.error("Oops something went wrong!");
            }
        }

        /**
         * Get cart contents
         *
         * @returns {HttpPromise}
         */
        function getCartContents() {
            return $http.get(endpoints.BACK.GET_CART_CONTENTS)
              .then(getCartContentsComplete)
              .catch(getCartContentsFailed);

            /**
             * success callback
             *
             * @param response
             * @returns {Object}
             */
            function getCartContentsComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function getCartContentsFailed(response) {
                toastr.error('Oops something went wrong with your cart!');
                console.error(response);
            }
        }
    }
})();