(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('SubcategoriesController', SubcategoriesController);

    SubcategoriesController.$inject = ['SubcategoryFactory', 'toastr'];

    function SubcategoriesController(SubcategoryFactory, toastr) {
        var vm = this;

        activate();

        /**
         * Constructor
         *
         * @returns {HttpPromise}
         */
        function activate() {
            toastr.success('Subcategory Controller activated');
            return SubcategoryFactory.getSubcategories()
                .then(function(response) {
                    vm.subcategories = response.success;
                })
        }
    }
})();