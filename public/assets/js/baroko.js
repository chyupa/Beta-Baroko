(function () {
    'use strict';
    //TODO: refactor categories and subcategories to use one factory instead of two. No need for two.
    angular
        .module('baroko.front', [
            'ngAnimate',
            'toastr'
        ])
        .constant('endpoints', {
            BACK: {
                GET_PRODUCTS: '/api/getPublicProducts',
                GET_PRODUCT: '/api/getProduct/',

                ADD_TO_CART: '/api/addToCart',
                GET_CART_CONTENTS: '/api/getCartContents',
                REMOVE_CART_ITEM: '/api/removeCartItem',
                UPDATE_CART_QUANTITY: '/api/updateCartQuantity',

                PLACE_ORDER: '/api/placeOrder',

                GET_CATEGORIES: '/api/getCategories',
                GET_CATEGORY: '/api/getCategory/',

                GET_SUBCATEGORIES: '/api/getSubcategories',
                GET_SUBCATEGORY: '/api/getSubcategory'
            },
            FRONT: {
                THANK_YOU: '/thank-you'
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
      .filter('transportFee', transportFee);

    /**
     * Transport Fee function that returns the actual amount of the fee
     *
     * @returns {Function}
     */
    function transportFee() {
        return function(total) {
            if (total < 300) {
                return 22.5;
            } else if (total < 700) {
                return 9;
            } else {
                return 0;
            }
        }
    }
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
            addToCart: addToCart,
            getCartContents: getCartContents,
            removeCartItem: removeCartItem,
            updateCartQuantity: updateCartQuantity
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

        /**
         * Get cart contents
         *
         * @returns {HttpPromise}
         */
        function getCartContents() {
            return $http.get(endpoints.BACK.GET_CART_CONTENTS)
              .then(getCartContentsComplete)
              .catch(getCartContentsFailed);

            /**
             * success callback
             *
             * @param response
             * @returns {Object}
             */
            function getCartContentsComplete(response) {
                return response.data;
            }

            /**
             * error callback
             *
             * @param response
             */
            function getCartContentsFailed(response) {
                toastr.error('Oops something went wrong with your cart!');
                console.error(response);
            }
        }

        /**
         * Remove cart item
         *
         * @param data
         * @returns {HttpPromise}
         */
        function removeCartItem(data) {
            return $http.post(endpoints.BACK.REMOVE_CART_ITEM, data)
                .then(removeCartItemComplete)
                .catch(removeCartItemFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function removeCartItemComplete(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function removeCartItemFailed(reponse) {
                toastr.error('Ooops! Could not remove the cart item');
            }
        }

        /**
         * Update cart item
         *
         * @param data
         * @returns {HttpPromise}
         */
        function updateCartQuantity(data) {
            return $http.post(endpoints.BACK.UPDATE_CART_QUANTITY, data)
                .then(updateCartQuantityComplete)
                .catch(updateCartQuantityFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function updateCartQuantityComplete(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function updateCartQuantityFailed(reponse) {
                toastr.error('Ooops! Could not update the cart item');
            }
        }
    }
})();
(function () {
    'use strict';

    angular
        .module('baroko.front')
        .factory('CategoryFactory', CategoryFactory);

    CategoryFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Category factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getCategories: getCategories, getCategory: getCategory}}
     * @constructor
     */
    function CategoryFactory ($http, endpoints, toastr) {
        return {
            getCategories: getCategories,
            getCategory: getCategory
        };

        /**
         * Get all categories
         *
         * @returns {HttpPromise}
         */
        function getCategories() {
            return $http.get(endpoints.BACK.GET_CATEGORIES)
                .then(getCategoriesComplete)
                .catch(getCategoriesFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function getCategoriesComplete(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getCategoriesFailed(response) {
                toastr.error('Ooops! Categories fetch failed');
                console.log(response);
            }
        }

        /**
         * get category by slug
         *
         * @param categorySlug
         * @returns {HttpPromise}
         */
        function getCategory(categorySlug) {
            return $http.get(endpoints.BACK.GET_CATEGORY + categorySlug)
                .then(getCategorySuccess)
                .catch(getCategoryFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {*}
             */
            function getCategorySuccess(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getCategoryFailed(response) {
                toastr.error('Ooops! Did not find the category');
                console.error(response);
            }
        }
    }
})();
(function() {
    'use strict';

    angular
      .module('baroko.front')
      .factory('CheckoutFactory', CheckoutFactory);

    CheckoutFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Checkout factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{placeOrder: placeOrder}}
     * @constructor
     */
    function CheckoutFactory($http, endpoints, toastr) {
        return {
            placeOrder: placeOrder
        };

        /**
         * Place order
         *
         * @param data
         * @returns {HttpPromise}
         */
        function placeOrder(data) {
            return $http.post(endpoints.BACK.PLACE_ORDER, data)
              .then(placeOrderComplete)
              .catch(placeOrderFailed);

            /**
             * success callback
             *
             * @param response
             * @returns {Object}
             */
            function placeOrderComplete(response) {
                return response.data;
            }

            /**
             * error callback
             * show toast
             *
             * @param response
             */
            function placeOrderFailed(response) {
                console.log(response);
                toastr.error('Ooops! Could not place the order');
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
      .factory('OrderFactory', OrderFactory);

    OrderFactory.$inject = ['$http', 'endpoints'];

    function OrderFactory($http, endpoints) {
        return {
            createOrder: createOrder
        }

        function createOrder(data) {
            return $http.post(endpoints, data)
              .then(createOrderComplete)
              .catch(createOrderFailed);

            function createOrderComplete(response) {
                return response.data;
            }

            function createOrderFailed(response) {
                toastr.error("Ooops! We couldn't add your order");
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
        .factory('SubcategoryFactory', SubcategoryFactory);

    SubcategoryFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Subcategories factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getSubcategories: getSubcategories}}
     * @constructor
     */
    function SubcategoryFactory($http, endpoints, toastr) {
        return {
            getSubcategories: getSubcategories
        };

        /**
         * get all subcategories
         *
         * @returns {HttpPromise}
         */
        function getSubcategories() {
            return $http.get(endpoints.BACK.GET_SUBCATEGORIES)
                .then(getSubcategoriesComplete)
                .catch(getSubcategoriesFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function getSubcategoriesComplete(response) {
                return response.data;
            }

            /**
             * Failed callback
             *
             * @param response
             */
            function getSubcategoriesFailed(response) {
                toastr.error('Ooops! Could not retrieve subcategories');
                console.error(response);
            }
        }
    }
})();
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
(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoriesController', CategoriesController);

    CategoriesController.$inject = ['CategoryFactory', 'toastr'];
    function CategoriesController(CategoryFactory, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Categories Controller activated');
            return CategoryFactory.getCategories()
                .then(function(response) {
                    console.log(response);
                    vm.categories = response.success;
                });
        }
    }
})();
(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CategoryController', CategoryController);

    CategoryController.$inject = ['CategoryFactory', '$location', 'toastr'];

    function CategoryController(CategoryFactory, $location, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Category Controller activated');
            return CategoryFactory.getCategory(getSlugFromUrl())
                .then(function(response) {
                    vm.category = response.success;
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
(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('CheckoutController', CheckoutController);

    CheckoutController.$inject = ['CheckoutFactory', 'toastr', '$window'];

    function CheckoutController(CheckoutFactory, toastr, $window) {
        var vm = this;
        vm.placeOrder = placeOrder;
        vm.formData = {};

        activate();

        /**
         * place order
         * @returns {HttpPromise}
         */
        function placeOrder() {
            return CheckoutFactory.placeOrder(vm.formData)
              .then(function(response) {
                  if (response.success) {
                      $window.location.href = response.success;
                  }
              });
        }

        /**
         * activation function
         */
        function activate() {
            toastr.success('CheckoutController activated');
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
(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('SubcategoriesController', SubcategoriesController);

    SubcategoriesController.$inject = ['SubcategoryFactory', 'toastr'];

    function SubcategoriesController(SubcategoryFactory, toastr) {
        var vm = this;

        activate();

        /**
         * Constructor
         *
         * @returns {HttpPromise}
         */
        function activate() {
            toastr.success('Subcategory Controller activated');
            return SubcategoryFactory.getSubcategories()
                .then(function(response) {
                    vm.subcategories = response.success;
                })
        }
    }
})();
//# sourceMappingURL=baroko.js.map
