(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CheckoutController', CheckoutController);

    CheckoutController.$inject = ['toastr'];

    function CheckoutController(toastr) {
        var vm = this;
        vm.formData = {};

        activate();

        function activate() {
            toastr.success('CheckoutController activated');
        }
    }
})();