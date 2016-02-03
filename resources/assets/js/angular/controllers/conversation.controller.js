(function () {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ConversationController', ConversationController);

    ConversationController.$inject = ['ConversationFactory', '$location', 'toastr'];

    function ConversationController(ConversationFactory, $location, toastr) {
        var vm = this;

        activate();

        function activate() {
            toastr.success('Conversation Controller activated');
            return ConversationFactory.getConversation(getUuidFromUrl())
                .then(function(response) {
                    vm.conversation = response.success;
                    console.log(vm.conversation);
                });
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