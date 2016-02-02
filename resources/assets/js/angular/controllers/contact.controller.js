(function() {
    'use strict';

    angular
        .module('baroko.front')
        .controller('ContactController', ContactController);

    ContactController.$inject = ['ContactFactory', 'toastr'];

    function ContactController(ContactFactory, toastr) {
        var vm = this;
        vm.submitForm = submitForm;
        vm.formData = {};

        activate();


        function submitForm() {
            return ContactFactory.saveContact(vm.formData)
                .then(function(response) {
                    toastr.success(response.success);
                });
        }

        function activate() {
            toastr.success('Contact Controller activated');
        }
    }
})();