(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoryController', CategoryController);

    CategoryController.$inject = ['CategoryFactory', '$location', 'toastr'];

    function CategoryController(CategoryFactory, $location, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Category Controller activated');
            return CategoryFactory.getCategory(getSlugFromUrl())
                .then(function(response) {
                    vm.category = response.success;
                });
        }


        /**
         * helper function for getting the slug
         *
         * @returns {string}
         */
        function getSlugFromUrl() {
            return $location.absUrl().split('/').pop();
        }
    }
})();