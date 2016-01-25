(function () {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CategoryFactory', CategoryFactory);

    CategoryFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * CategoryFactory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getCategory: getCategory}}
     * @constructor
     */
    function CategoryFactory ($http, endpoints, toastr) {
        return {
            getCategory: getCategory
        };

        /**
         * get category by slug
         *
         * @param categorySlug
         * @returns {*}
         */
        function getCategory(categorySlug) {
            return $http.get(endpoints.BACK.GET_CATEGORY, categorySlug)
                .then(getCategorySuccess)
                .catch(getCategoryFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {*}
             */
            function getCategorySuccess(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getCategoryFailed(response) {
                toastr.error('Ooops! Did not find the category');
                console.error(response);
            }
        }
    }
})();