(function () {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CategoryFactory', CategoryFactory);

    CategoryFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Category factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getCategories: getCategories, getCategory: getCategory}}
     * @constructor
     */
    function CategoryFactory ($http, endpoints, toastr) {
        return {
            getCategories: getCategories,
            getCategory: getCategory
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

        /**
         * get category by slug
         *
         * @param categorySlug
         * @returns {HttpPromise}
         */
        function getCategory(categorySlug) {
            return $http.get(endpoints.BACK.GET_CATEGORY + categorySlug)
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