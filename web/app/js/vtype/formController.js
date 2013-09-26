angular.element(document).ready(function() {
    angular.module('vrmApp', []);
    angular.bootstrap(document, ['vrmApp']);
});
'use strict';

// Declare app level module which depends on filters, and services
angular.module('vrmApp', []);

/* Controllers */
function formController($scope) {
    $scope.vtype_name = $scope.display_name;
    $scope.addNames = function() {
        var count = $scope.passengers;
        var vtype = $scope.vtype;
        if(count !== undefined && vtype !== undefined)
        {
            $scope.display_name = count+'-passenger'+' '+ucfirst(vtype);
        }
        else {
            $scope.display_name = '';
        }
        $scope.vtype_name = $scope.display_name;
    }
}
