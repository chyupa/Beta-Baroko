(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CheckoutController', CheckoutController);

    CheckoutController.$inject = ['CheckoutFactory', 'toastr'];

    function CheckoutController(CheckoutFactory, toastr) {
        var vm = this;
        vm.placeOrder = placeOrder;
        vm.formData = {};

        activate();

        /**
         * place order
         * @returns {HttpPromise}
         */
        function placeOrder() {
            return CheckoutFactory.placeOrder(vm.formData)
              .then(function(response) {
                  console.log(response);
              });
        }

        /**
         * activation function
         */
        function activate() {
            toastr.success('CheckoutController activated');
        }


    }
})();