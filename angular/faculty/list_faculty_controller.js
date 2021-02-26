app.controller('listFacultyController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.data = {};

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/faculty_list/get_all_faculty')
            .then(function (response)
            {
                $scope.data = response.data;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.init();
});