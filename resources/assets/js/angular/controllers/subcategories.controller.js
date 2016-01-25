(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('SubcategoriesController', SubcategoriesController);

    SubcategoriesController.$inject = ['SubcategoriesFactory', 'toastr'];

    function SubcategoriesController(SubcategoriesFactory, toastr) {
        var vm = this;

        activate();

        /**
         * Constructor
         *
         * @returns {HttpPromise}
         */
        function activate() {
            toastr.success('Subcategory Controller activated');
            return SubcategoriesFactory.getSubcategories()
                .then(function(response) {
                    vm.subcategories = response.success;
                })
        }
    }
})();