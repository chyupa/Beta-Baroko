(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CartFactory', CartFactory);

    CartFactory.$inject = ['endpoints', 'toastr', '$http'];

    function CartFactory(endpoints, toastr, $http) {
        return {
            addToCart: addToCart
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
    }
})();