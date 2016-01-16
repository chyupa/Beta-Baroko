(function() {
   'use strict';

    angular
        .module('baroko.front')
        .factory('HomePageFactory', HomePageFactory);

    HomePageFactory.$inject = ['endpoints', '$http', 'toastr'];

    function HomePageFactory(endpoints, $http, toastr) {

        return {
            getProducts: getProducts
        };

        /**
         * Get all products
         *
         * @returns {HttpPromise}
         */
        function getProducts() {
            return $http.get(endpoints.BACK.GET_PRODUCTS)
                .then(getProductsComplete)
                .catch(getProductsFailed);

            /**
             * Return data
             *
             * @param response
             * @returns {*}
             */
            function getProductsComplete (response) {
                return response.data;
            }

            /**
             * Show error
             *
             * @param response
             */
            function getProductsFailed (response) {
                toastr.error("Get Products Failed because: " + response.data);
            }
        }
    }
})();