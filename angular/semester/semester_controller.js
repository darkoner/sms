app.controller('semesterController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.course = {};
    $scope.semester={};

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/semester/get_all_details')
            .then(function (response)
            {
                $scope.course = response.data.course;
                $scope.semester = response.data.semester;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.add = function ()
    {
        $scope.semester.push(
            {
                id: '',
                course_id: '',
                semester_name: ''
            }
        );
    };
    $scope.remove = function ()
    {
        $scope.semester.forEach(function (v)
        {
            if (v.id == '')
            {
                $scope.semester.pop(v);
            }
        });
    };

    $scope.save = function ()
    {
        $scope.loading = true;
        $http.post(url + 'api/semester/save', {
            data: $scope.semester
        })
            .then(function (response)
            {
                $scope.semester = response.data.semester;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.delete = function (t)
    {
        $scope.loading = true;
        $http.post(url + 'api/semester/delete', {
            id: t.id
        })
            .then(function (response)
            {
                $scope.semester = response.data.semester;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.init();
});