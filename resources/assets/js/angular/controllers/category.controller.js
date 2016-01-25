(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoryController', CategoryController);

    CategoryController.$inject = ['CategoryFactory', 'toastr'];

    function CategoryController(CategoryFactory, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Category Controller activated');
            return CategoryFactory.getCategory(getSlugFromUrl())
                .then(function(response) {
                    vm.category = response;
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