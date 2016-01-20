(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CartFactory', CartFactory);

    CartFactory.$inject = ['endpoints', 'toastr', '$http'];

    function CartFactory(endpoints, toastr, $http) {
        return {
            addToCart: addToCart,
            getCartContents: getCartContents,
            removeCartItem: removeCartItem,
            updateCartQuantity: updateCartQuantity
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

        /**
         * Remove cart item
         *
         * @param data
         * @returns {HttpPromise}
         */
        function removeCartItem(data) {
            return $http.post(endpoints.BACK.REMOVE_CART_ITEM, data)
                .then(removeCartItemComplete)
                .catch(removeCartItemFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function removeCartItemComplete(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function removeCartItemFailed(reponse) {
                toastr.error('Ooops! Could not remove the cart item');
            }
        }

        /**
         * Update cart item
         *
         * @param data
         * @returns {HttpPromise}
         */
        function updateCartQuantity(data) {
            return $http.post(endpoints.BACK.UPDATE_CART_QUANTITY, data)
                .then(updateCartQuantityComplete)
                .catch(updateCartQuantityFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function updateCartQuantityComplete(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function updateCartQuantityFailed(reponse) {
                toastr.error('Ooops! Could not update the cart item');
            }
        }
    }
})();