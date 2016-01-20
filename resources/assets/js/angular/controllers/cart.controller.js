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

        function updateCartItem(index) {
            var data = {
                url: getSlugFromUrl()
            };
            var data = vm.cartContents[index];
            return CartFactory.addToCart(data)
                .then(function(response) {
                    console.log(response);
                    toastr.success('updateCartItem');
                });
        }

        function activate() {
            return CartFactory.getCartContents()
                .then(function(response) {
                    console.log(response);
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