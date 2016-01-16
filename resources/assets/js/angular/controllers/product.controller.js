(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ProductController', ProductController);

    ProductController.$inject = ['toastr', 'ProductFactory', 'CartFactory', '$location', 'extensions'];

    function ProductController(toastr, ProductFactory, CartFactory, $location, extensions) {
        var vm = this;
        vm.submitForm = submitForm;
        vm.addQuantity = addQuantity;
        vm.removeQuantity = removeQuantity;
        vm.quantity = 0;
        vm.singleExtension = '';
        vm.pluralExtension = '';

        activate();

        /**
         * Add one unit
         *
         * @returns {number}
         */
        function addQuantity() {
            return ++vm.quantity;
        }

        /**
         * Remove one unit
         *
         * @returns {number}
         */
        function removeQuantity() {
            return --vm.quantity;
        }

        /**
         * Get product info
         *
         * @returns {HttpPromise}
         */
        function getProductInfo() {
            return ProductFactory.getProduct(getSlugFromUrl())
                .then(function(response) {
                    vm.product = response.product;
                });
        }

        function submitForm() {

            var data = {
                url: getSlugFromUrl(),
                quantity: vm.quantity,
                price: vm.product.prices.price
            };

            return CartFactory.addToCart(data)
                .then(function (response) {
                    toastr.success(response.success);
                });
        }

        /**
         * activate controller
         */
        function activate() {
            toastr.success('ProductController activated');

            getProductInfo();
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