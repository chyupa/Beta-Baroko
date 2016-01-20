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