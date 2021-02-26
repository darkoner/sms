app.controller('addStudentController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/add_student/get_details')
            .then(function (response)
            {
                $scope.semester = response.data;
                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.addNewStudent = function (Student)
    {
        $(".preloader").css('opacity', '0.5').fadeIn();
        $scope.loading = true;
        $http.post(url + 'api/add_student/save_student_details', {
            student_data: Student
        })
            .then(function (response)
            {
                $scope.Student = {};
                $scope.loading = false;
                $scope.errors=[];
                successMsg('Saved', 'Student Data Saved');
                $(".preloader").fadeOut();
            })
            .catch(function (e)
            {
                errorMsg();
                $scope.errors = e.data.errors;
                $scope.loading = false;
                $(".preloader").fadeOut();
            });
    };

    $scope.init();
});