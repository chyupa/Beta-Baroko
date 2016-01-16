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
                GET_PRODUCT: 'api/getProduct'
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

        function getProduct() {
            //return $http.get(endpoints.BACK.GET_PRODUCT)
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

    ProductController.$inject = ['toastr', 'ProductFactory'];

    function ProductController(toastr, ProductFactory) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('ProductController activated');
        }
    }
})();
//# sourceMappingURL=baroko.js.map
