app.controller('courseController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.data = {};

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/course/get_all_details')
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

    $scope.add = function ()
    {
        $scope.data.push(
            {
                id: '',
                name: ''
            }
        );
    };

    $scope.save = function ()
    {
        $scope.loading = true;
        $http.post(url + 'api/course/save', {
            data: $scope.data
        })
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
    $scope.remove = function ()
    {
        $scope.data.forEach(function (v)
        {
            if (v.id== '')
            {
                $scope.data.pop(v);
            }
        });
    };

    $scope.delete = function (t)
    {
        $scope.loading = true;
        $http.post(url + 'api/course/delete', {
            id: t.id
        })
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