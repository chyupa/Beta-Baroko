(function() {
    'use strict';

    angular
        .module('baroko.front')
        .factory('ConversationFactory', ConversationFactory);

    ConversationFactory.$inject = ['$http', 'endpoints', 'toastr'];

    /**
     * Get conversation factory
     *
     * @param $http
     * @param endpoints
     * @param toastr
     * @returns {{getConversation: getConversation}}
     * @constructor
     */
    function ConversationFactory($http, endpoints, toastr) {
        return {
            getConversation: getConversation,
            saveReply: saveReply
        };

        /**
         * Get conversation by uuid
         *
         * @param uuid
         * @returns {HttpPromise}
         */
        function getConversation(uuid) {
            return $http.get(endpoints.BACK.GET_CONVERSATION + uuid)
                .then(getConversationComplete)
                .catch(getConversationFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {Object}
             */
            function getConversationComplete(response) {
                return response.data;
            }

            /**
             * Error callback
             *
             * @param response
             */
            function getConversationFailed(response) {
                console.log(response);
                toastr.error(response.error);
            }
        }

        /**
         * Save Reply
         *
         * @param data
         * @returns {HttpPromise}
         */
        function saveReply(data) {
            return $http.post(endpoints.BACK.SAVE_REPLY, data)
                .then(saveReplyCompleted)
                .catch(saveReplyFailed);

            /**
             * Success callback
             *
             * @param response
             * @returns {*}
             */
            function saveReplyCompleted(response) {
                return response.data;
            }

            /**
             * Error callback
             * @param response
             */
            function saveReplyFailed(response) {
                toastr.error('Ooops! Could not send your reply.');
                console.log(response);
            }
        }
    }
})();