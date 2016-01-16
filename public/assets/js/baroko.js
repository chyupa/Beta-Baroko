(function () {
    'use strict';

    angular
        .module('baroko.front', [
            'ngAnimate',
            'toastr'
        ])
        .constant('endpoints', {
            BACK: {
                GET_PRODUCTS: 'api/getPublicProducts',
                GET_PRODUCT: 'api/getProduct/',

                ADD_TO_CART: 'api/addToCart'
            }
        })
        .constant('extensions', {
            SINGLE: {
                METRU: 'metru',
                BUCATA: 'bucata'
            },
            PLURAL: {
                METRU: 'metrii',
                BUCATA: 'bucati'
            }
        });

})();
(function () {
    'use strict';

    angular
        .module('baroko.front')
        .filter('extension', extension);

    extension.$inject = ['extensions'];

    /**
     * Filter for using the right singular/plural product extension
     *
     * @param extensions
     * @returns {Function}
     */
    function extension(extensions) {

       return function(extension, quantity) {
           if (extension === extensions.SINGLE.BUCATA) {
               switch (quantity) {
                   case 0:
                       return quantity + ' ' + extensions.PLURAL.BUCATA;
                   case 1:
                       return quantity + ' ' + extensions.SINGLE.BUCATA;
                   default:
                       return quantity + ' ' + extensions.PLURAL.BUCATA;
               }
           } else {
               switch (quantity) {
                   case 0:
                       return quantity + ' ' + extensions.PLURAL.METRU;
                   case 1:
                       return quantity + ' ' + extensions.SINGLE.METRU;
                   default:
                       return quantity + ' ' + extensions.PLURAL.METRU;
               }
           }
       }
    }
})();
(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CartFactory', CartFactory);

    CartFactory.$inject = ['endpoints', 'toastr', '$http'];

    function CartFactory(endpoints, toastr, $http) {
        return {
            addToCart: addToCart
        };

        /**
         * Get product info
         *
         * @param string url
         * @returns {HttpPromise}
         */
        function addToCart(data) {
            return $http.post(endpoints.BACK.ADD_TO_CART, data)
                .then(addToCartComplete)
                .catch(addToCartFailed)

            /**
             * success callback
             *
             * @param response
             * @returns {*}
             */
            function addToCartComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function addToCartFailed(response) {
                toastr.error("Oops something went wrong!");
            }
        }
    }
})();
(function() {
   'use strict';

    angular
        .module('baroko.front')
        .factory('HomePageFactory', HomePageFactory);

    HomePageFactory.$inject = ['endpoints', '$http', 'toastr'];

    function HomePageFactory(endpoints, $http, toastr) {

        return {
            getProducts: getProducts
        };

        /**
         * Get all products
         *
         * @returns {HttpPromise}
         */
        function getProducts() {
            return $http.get(endpoints.BACK.GET_PRODUCTS)
                .then(getProductsComplete)
                .catch(getProductsFailed);

            /**
             * Return data
             *
             * @param response
             * @returns {*}
             */
            function getProductsComplete (response) {
                return response.data;
            }

            /**
             * Show error
             *
             * @param response
             */
            function getProductsFailed (response) {
                toastr.error("Get Products Failed because: " + response.data);
            }
        }
    }
})();
(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('ProductFactory', ProductFactory);

    ProductFactory.$inject = ['endpoints', 'toastr', '$http'];

    function ProductFactory(endpoints, toastr, $http) {
        return {
            getProduct: getProduct
        };

        /**
         * Get product info
         *
         * @param string url
         * @returns {HttpPromise}
         */
        function getProduct(url) {
            return $http.get(endpoints.BACK.GET_PRODUCT + url)
                .then(getProductComplete)
                .catch(getProductFailed)

            /**
             * success callback
             *
             * @param response
             * @returns {*}
             */
            function getProductComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function getProductFailed(response) {
                toastr.error("Oops something went wrong!");
            }
        }
    }
})();
(function () {
   'use strict';

    angular
        .module('baroko.front')
        .controller('HomePageController', HomePageController)

    HomePageController.$inject = ['toastr', 'HomePageFactory'];

    function HomePageController(toastr, HomePageFactory) {
        var vm = this;

        activate();

        /**
         * Get all products
         *
         * @returns {HttpPromise}
         */
        function getProducts() {
            return HomePageFactory.getProducts()
                .then(function (response) {
                    vm.products = response.products;;
                    toastr.success(response.success);
                })
        }

        /**
         * activation function
         */
        function activate() {
            getProducts();
        }
    }
})();
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
//# sourceMappingURL=baroko.js.map
