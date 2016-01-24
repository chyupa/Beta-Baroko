(function () {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CategoriesFactory', CategoriesFactory);

    CategoriesFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Categories factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getCategories: getCategories}}
     * @constructor
     */
    function CategoriesFactory($http, endpoints, toastr) {
        return {
            getCategories: getCategories
        };

        /**
         * Get all categories
         *
         * @returns {HttpPromise}
         */
        function getCategories() {
            return $http.get(endpoints.BACK.GET_CATEGORIES)
                .then(getCategoriesComplete)
                .catch(getCategoriesFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function getCategoriesComplete(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getCategoriesFailed(response) {
                toastr.error('Ooops! Categories fetch failed');
                console.log(response);
            }
        }
    }
})();