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