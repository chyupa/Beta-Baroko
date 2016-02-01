(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('ContactFactory', ContactFactory);

    ContactFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Save contact info to DB
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{saveContact: saveContact}}
     * @constructor
     */
    function ContactFactory($http, endpoints, toastr) {
        return {
            saveContact: saveContact
        };

        /**
         * Call the BACK endpoint to save the data
         *
         * @param data
         * @returns {HttpPromise}
         */
        function saveContact(data) {
            return $http.post(endpoints.BACK.SAVE_CONTACT, data)
                .then(saveContactCompleted)
                .catch(saveContactFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function saveContactCompleted(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function saveContactFailed(response) {
                toastr.error('Ooops! Could not send your message.');
                console.log(response);
            }
        }
    }
})();