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
                GET_PRODUCT: 'api/getProduct/'
            }
        });

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

    ProductController.$inject = ['toastr', 'ProductFactory', '$location'];

    function ProductController(toastr, ProductFactory, $location) {
        var vm = this;
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
                    if (vm.product.info.extension == 'bucata') {
                        vm.singleExtension = 'bucata';
                        vm.pluralExtension = 'bucati';
                    } else {
                        vm.singleExtension = 'metru';
                        vm.pluralExtension = 'metrii';
                    }
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
