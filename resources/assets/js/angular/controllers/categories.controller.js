(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoriesController', CategoriesController);

    CategoriesController.$inject = ['CategoriesFactory', 'toastr'];
    function CategoriesController(CategoriesFactory, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Categories Controller activated');
            return CategoriesFactory.getCategories()
                .then(function(response) {
                    console.log(response);
                    vm.categories = response.success;
                });
        }
    }
})();