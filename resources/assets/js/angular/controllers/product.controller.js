(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ProductController', ProductController);

    ProductController.$inject = ['toastr', 'ProductFactory'];

    function ProductController(toastr, ProductFactory) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('ProductController activated');
        }
    }
})();