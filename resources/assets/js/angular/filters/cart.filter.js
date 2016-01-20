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
            if (total < 300) {
                return 22.5;
            } else if (total < 700) {
                return 9;
            } else {
                return 0;
            }
        }
    }
})();