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