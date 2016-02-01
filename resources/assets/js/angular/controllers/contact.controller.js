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
            
        }

        function activate() {
            toastr.success('Contact Controller activated');
        }
    }
})();