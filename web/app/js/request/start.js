angular.element(document).ready(function() {
    angular.module('vrmApp', []);
    angular.bootstrap(document, ['vrmApp']);
});
'use strict';

// Declare app level module which depends on filters, and services
angular.module('vrmApp', []);

/* Controllers */
function formController($scope) {

    $scope.no_days = 1;

    $scope.submitForm = function () {
        $scope.startForm.submit();
    }

}
