(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoriesController', CategoriesController);

    CategoriesController.$inject = ['CategoryFactory', 'toastr'];
    function CategoriesController(CategoryFactory, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Categories Controller activated');
            return CategoryFactory.getCategories()
                .then(function(response) {
                    console.log(response);
                    vm.categories = response.success;
                });
        }
    }
})();