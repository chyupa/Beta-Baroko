(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CheckoutController', CheckoutController);

    CheckoutController.$inject = ['CheckoutFactory', 'toastr', '$window'];

    function CheckoutController(CheckoutFactory, toastr, $window) {
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
                  if (response.success) {
                      $window.location.href = response.success;
                  }
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