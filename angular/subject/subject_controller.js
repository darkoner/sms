app.controller('subjectController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.course = {};
    $scope.semester={};
    $scope.subject={};
    $scope.course_sem={};

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/subject/get_all_details')
            .then(function (response)
            {
                $scope.course = response.data.course;
                $scope.semester = response.data.semester;
                $scope.subject = response.data.subject;
                $scope.course_sem=response.data.course_sem;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.add = function ()
    {
        $scope.subject.push(
            {
                id: '',
                semester_id: '',
                name: '',
                subject_code: '',
                view_elective: 0,
                is_core: 1
            }
        );
    };
    $scope.remove = function ()
    {
        $scope.subject.forEach(function (v)
        {
            if (v.id == '')
            {
                $scope.subject.pop(v);
            }
        });
    };

    $scope.save = function ()
    {
        $scope.loading = true;
        $http.post(url + 'api/subject/save', {
            data: $scope.subject
        })
            .then(function (response)
            {
                $scope.subject = response.data.subject;
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
        $http.post(url + 'api/subject/delete', {
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