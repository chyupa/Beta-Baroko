(function () {
    'use strict';

    angular
        .module('baroko.front')
        .factory('SubcategoriesFactory', SubcategoriesFactory);

    SubcategoriesFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Subcategories factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getSubcategories: getSubcategories}}
     * @constructor
     */
    function SubcategoriesFactory($http, endpoints, toastr) {
        return {
            getSubcategories: getSubcategories
        };

        /**
         * get all subcategories
         *
         * @returns {HttpPromise}
         */
        function getSubcategories() {
            return $http.get(endpoints.BACK.GET_SUBCATEGORIES)
                .then(getSubcategoriesComplete)
                .catch(getSubcategoriesFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function getSubcategoriesComplete(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getSubcategoriesFailed(response) {
                toastr.error('Ooops! Could not retrieve subcategories');
                console.error(response);
            }
        }
    }
})();