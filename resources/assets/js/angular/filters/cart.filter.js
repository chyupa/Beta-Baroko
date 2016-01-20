(function () {
    'use strict';

    angular
      .module('baroko.front')
      .filter('transportFee', transportFee);

    /**
     * Transport Fee function that returns the actual amount of the fee
     *
     * @returns {Function}
     */
    function transportFee() {
        return function(total) {
            switch (total) {
                case total < 300:
                    return 22.5;
                case total < 700:
                    return 9;
                default:
                    return 0;
            }
        }
    }
})();