(function () {
    'use strict';

    angular
        .module('baroko.front')
        .directive('barokoCart', barokoCart);

    function barokoCart() {
        var directive = {
            restrict: 'EA',
            templateUrl: '/assets/views/cart-directive.html',
            scope: false,
            controller: 'CartController as vm',
            //bindToController: true
        };

        return directive;
    }
})();