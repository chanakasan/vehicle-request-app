angular.element(document).ready(function() {
    angular.module('vrmApp', []);
    angular.bootstrap(document, ['vrmApp']);
});
'use strict';

// Declare app level module which depends on filters, and services
angular.module('vrmApp', []);

/* Controllers */
function startController($scope) {
    $scope.no_days = 1;
}
