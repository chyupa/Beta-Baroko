(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ProductController', ProductController);

    ProductController.$inject = ['toastr', 'ProductFactory', 'CartFactory', '$location'];

    function ProductController(toastr, ProductFactory, CartFactory, $location) {
        var vm = this;
        vm.submitForm = submitForm;
        vm.addQuantity = addQuantity;
        vm.removeQuantity = removeQuantity;
        vm.quantity = 0;

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

            /**
             * send this object to backend in order to save in DB
             * we also send the price since the price might change and it is best to save this value for the order
             *
             * @type {{url: string, quantity: number, price: number}}
             */
            var data = {
                url: getSlugFromUrl(),
                quantity: vm.quantity,
                price: vm.product.prices.price
            };

            /**
             * call backend to add to cart
             */
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