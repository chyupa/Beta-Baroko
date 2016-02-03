(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ConversationController', ConversationController);

    ConversationController.$inject = ['ConversationFactory', '$location', 'toastr'];

    function ConversationController(ConversationFactory, $location, toastr) {
        var vm = this;
        vm.formData = {};
        vm.saveReply = saveReply;
        vm.isClientInitiator = isClientInitiator;

        function saveReply() {
            var data = {
                message: vm.formData.message,
                uuid: getUuidFromUrl()
            };

            return ConversationFactory.saveReply(data)
                .then(function(response) {
                    vm.formData = {};
                    toastr.success(response.success);

                    vm.conversation.messages.push({
                        message: data.message,
                        initiator: 'client',
                        created_at: new Date()
                    });

                })
        }

        activate();

        function activate() {
            toastr.success('Conversation Controller activated');
            return ConversationFactory.getConversation(getUuidFromUrl())
                .then(function(response) {
                    vm.conversation = response.success;
                    console.log(vm.conversation);
                });
        }

        function isClientInitiator(messageIndex) {
            return vm.conversation.messages[messageIndex].initiator === 'client';
        }

        /**
         * helper function for getting the slug
         *
         * @returns {string}
         */
        function getUuidFromUrl() {
            return $location.absUrl().split('/').pop();
        }
    }

})();