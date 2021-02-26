app.controller('facultyProfileController', function ($rootScope, $scope, $http, $window, $location)
{
    $scope.loading = false;

    $scope.profile = {};

    $scope.user_id = $location.search().user_id;

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.post(url + 'api/faculty_profile/get_profile_details', {
            user_id: $scope.user_id
        })
            .then(function (response)
            {
                $scope.profile = response.data.profile;
                $scope.auth_user = response.data.auth_user;
                $scope.loading = false;
            })
            .catch(function ()
            {
                errorMsg();
                $scope.loading = false;
            });
    };

    $scope.Save = function ()
    {
        $scope.loading = true;
        $http.post(url + 'api/faculty_profile/save', {
            data: $scope.profile,
            user_id: $scope.user_id
        })
            .then(function (response)
            {
                $scope.errors = [];
                successMsg('Updated', 'Profile Updated');

                $scope.profile = response.data.profile;
                $scope.auth_user = response.data.auth_user;

                $scope.loading = false;
            })
            .catch(function (e)
            {
                errorMsg();
                $scope.errors = e.data.errors;
                $scope.loading = false;
            });
    };

    var formData = new FormData();

    $scope.setTheFiles = function ($files)
    {
        angular.forEach($files, function (value, key)
        {
            formData.append('user_id', $scope.user_id);
            formData.append('profile_update', value);

            //for student certificates
            formData.append('doc_file', value);
        });
    };

    $scope.uploadPic = function ()
    {
        $scope.loading = true;

        $http({
            method: 'POST',
            url: url + 'api/faculty_profile/upload_pic',
            headers: {
                'Content-Type': undefined
            },
            data: formData
        })
            .then(function (response)
            {
                successMsg('Saved', 'Profile Picture Updated');
                $scope.profile = response.data.profile;

                $scope.loading = false;
            })
            .catch(function (e)
            {
                errorMsg();
                $scope.errors = e.data.errors;
                $scope.loading = false;
            });
    };

    function isValidEmailAddress(emailAddress)
    {
        var pattern = new RegExp(
            /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    $scope.init();
});
