(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('ProductFactory', ProductFactory);

    ProductFactory.$inject = ['endpoints', 'toastr', '$http'];

    function ProductFactory(endpoints, toastr, $http) {
        return {
            getProduct: getProduct
        };

        /**
         * Get product info
         *
         * @param string url
         * @returns {HttpPromise}
         */
        function getProduct(url) {
            return $http.get(endpoints.BACK.GET_PRODUCT + url)
                .then(getProductComplete)
                .catch(getProductFailed)

            /**
             * success callback
             *
             * @param response
             * @returns {*}
             */
            function getProductComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function getProductFailed(response) {
                toastr.error("Oops something went wrong!");
            }
        }
    }
})();