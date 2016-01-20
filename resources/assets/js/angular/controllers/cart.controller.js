(function() {
   'use strict';

    angular
      .module('baroko.front')
      .controller('CartController', CartController)

    CartController.$inject = ['toastr', 'CartFactory'];

    function CartController(toastr, CartFactory) {
        var vm = this;

        activate();

        function activate() {
            return CartFactory.getCartContents()
              .then(function(response) {
                  vm.cartContents = response;
                  console.log(response);
              });
        }
    }
})();