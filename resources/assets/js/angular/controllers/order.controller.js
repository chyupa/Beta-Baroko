(function() {
    'use strict'

    angular
      .module('baroko.front')
      .controller('OrderController', OrderController)

    OrderController.$inject = ['toastr'];

    function OrderController(toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Order Controller activated');
        }
    }
})();