angular.element(document).ready(function() {
    angular.module('vrmApp', []);
    angular.bootstrap(document, ['vrmApp']);
});
'use strict';

// Declare app level module which depends on filters, and services
angular.module('vrmApp', []);

/* Controllers */
function formController($scope) {
    $scope.calculate = function() {
        $scope.total_cost = Math.round(($scope.mileage * $scope.rate) * 100) / 100;
    }
}
