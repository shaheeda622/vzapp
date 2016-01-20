'use strict';

northwindApp.controller('approveprofileController',
    function ($scope) {
        $scope.reloadRoute = function () {
            $route.reload();
        }
    });