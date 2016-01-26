(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('SubcategoryController', SubcategoryController);

    SubcategoryController.$inject = ['SubcategoryFactory', '$location', 'toastr'];

    function SubcategoryController(SubcategoryFactory, $location, toastr) {
        var vm = this;

        activate();

        /**
         * Constructor
         *
         * @returns {HttpPromise}
         */
        function activate() {
            toastr.success('Single Subcategory controller activated');
            return SubcategoryFactory.getProducts(getSlugFromUrl())
                .then(function(response) {
                    console.log(response);
                   vm.subcategory = response.success;
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