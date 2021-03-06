(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CartController', CartController)

    CartController.$inject = ['toastr', 'CartFactory', 'transportFeeFilter'];

    function CartController(toastr, CartFactory, transportFeeFilter) {
        var vm = this;
        vm.addQuantity = addQuantity;
        vm.removeQuantity = removeQuantity;
        vm.updateCartTotals = updateCartTotals;
        vm.removeCartItem = removeCartItem;
        vm.cartContents = {};
        vm.transportFee = 0;
        vm.total = 0;

        activate();

        /**
         * Increase item quantity
         *
         * @param index
         * @returns {HttpPromise}
         */
        function addQuantity(index) {
            return updateCartQuantity(index, true);
        }

        /**
         * Decrease item quantity
         *
         * @param index
         * @returns {HttpPromise}
         */
        function removeQuantity(index) {
            return updateCartQuantity(index, false);
        }

        /**
         * Remove item from cart
         *
         * @param index
         * @returns {*|Array.<T>}
         */
        function removeCartItem(index) {
            var data = {
                url: vm.cartContents[index].product.url
            };
            return CartFactory.removeCartItem(data)
                .then(function (response) {
                    toastr.success(response.success);
                    vm.cartContents.splice(index, 1);
                    updateCartTotals();
                });
        }

        /**
         * TODO: need to calculate the updateCartTotals every time the quantity changes
         */
        function updateCartTotals() {
            //calculate total of cart contents
            var cartContentsLength = vm.cartContents.length;
            var total = 0;
            for (var i = 0; i < cartContentsLength; i++) {
                total += vm.cartContents[i].quantity * vm.cartContents[i].price;
            }
            //calculate transportFee
            vm.transportFee = transportFeeFilter(total);
            //add transportFee to total
            vm.total = total + vm.transportFee;
        }

        /**
         * Update Cart Item in backend
         * TODO: need to think about this
         *
         * @param index
         * @param increase
         * @returns {HttpPromise}
         */
        function updateCartQuantity(index, increase) {
            var quantity = vm.cartContents[index].quantity;
            var data = {
                url: vm.cartContents[index].product.url,
                quantity: increase ? ++quantity : --quantity
            };
            return CartFactory.updateCartQuantity(data)
                .then(function (response) {
                    toastr.success(response.success);
                    increase ? ++vm.cartContents[index].quantity : --vm.cartContents[index].quantity;
                    updateCartTotals();
                });
        }

        /**
         * Activate function
         *
         * @returns {HttpPromise}
         */
        function activate() {
            return CartFactory.getCartContents()
                .then(function (response) {
                    console.log(response);
                    vm.cartContents = response;
                    updateCartTotals();
                });
        }
    }
})();