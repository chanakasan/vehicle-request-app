angular.element(document).ready(function() {
    angular.module('vrmApp', []);
    angular.bootstrap(document, ['vrmApp']);
});
'use strict';

// Declare app level module which depends on filters, and services
angular.module('vrmApp', []);

function ucfirst(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

/* Controllers */
function formController($scope) {
    $scope.addNames = function() {
        var fn = $scope.first_name;
        var ln = $scope.last_name;
        if(fn !== undefined && ln !== undefined)
        {
            $scope.display_name = ucfirst(fn)+' '+ucfirst(ln);
        }
    }
}
