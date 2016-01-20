(function() {
   'use strict';

    angular
      .module('baroko.front')
      .controller('CartController', CartController)

    CartController.$inject = ['toastr', 'CartFactory', 'transportFeeFilter'];

    function CartController(toastr, CartFactory, transportFeeFilter) {
        var vm = this;
        vm.transportFee = transportFeeFilter(vm.total);
        vm.total = 0;

        activate();

        function activate() {
            return CartFactory.getCartContents()
              .then(function(response) {
                  vm.cartContents = response;
                  //calculate total of cart contents
                  var cartContentsLength = response.length;
                  for (var i = 0; i < cartContentsLength; i++) {
                      vm.total += response[i].quantity * response[i].price;
                  }
                  //add transportFee to total
                  vm.total += vm.transportFee;
              });
        }
    }
})();