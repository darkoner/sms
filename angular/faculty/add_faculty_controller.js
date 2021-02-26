app.controller('addFacultyController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.init = function ()
    {
        $scope.loading = true;
    };

    $scope.addNewFaculty = function (Faculty)
    {
        $(".preloader").css('opacity', '0.5').fadeIn();
        $scope.loading = true;
        $http.post(url + 'api/add_faculty/save_faculty', {
            faculty_data: Faculty
        })
            .then(function (response)
            {
                $scope.Faculty={};
                $scope.loading = false;
                $(".preloader").fadeOut();
                successMsg('Saved', 'Faculty Data Saved');

            })
            .catch(function ()
            {
                errorMsg();
                $scope.loading = false;
                $(".preloader").fadeOut();
            });
    };

    $scope.init();
});