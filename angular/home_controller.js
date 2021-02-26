app.controller('homeController', function ($scope, $http, $location, $window, $rootScope)
{
    $scope.loading = false;

    $scope.total_client = {};
    $scope.total_staff = {};
    $scope.project = {};
    $scope.total_quote = {};
    $scope.total_product = {};
    $scope.new_client = {};
    $scope.case_study = {};

    $scope.init = function ()
    {
        $scope.loading = true;
        $http.get(url + 'api/home/get_data_for_dashboard')
            .then(function (response)
            {
                //stats for admin dashboard
                $scope.users = response.data.user;
                $scope.total_staff = response.data.total_staff;
                $scope.total_quote = response.data.total_quote;
                $scope.total_product = response.data.total_product;
                $scope.new_client = response.data.new_client;
                $scope.case_study = response.data.case_study;
                $scope.project = response.data.project;
                $scope.quote = response.data.quote;

                $scope.loading = false;
            })
            .catch(function ()
            {
                $scope.loading = false;
            });
    };

    $scope.viewAllSpecifications = function ()
    {
        $window.location.href = url + "quote_list";
    };

    $scope.quoteReview = function (quote_id)
    {
        $(".preloader").css('opacity', '0.5').fadeIn();
        $scope.loading = true;
        $http.post(url + 'api/home/quote_review', {
            quote_id: quote_id,
            from: 'dashboard'
        })
            .then(function (response)
            {
                $scope.users = response.data.user;
                $scope.total_staff = response.data.total_staff;
                $scope.total_project = response.data.total_project;
                $scope.total_quote = response.data.total_quote;
                $scope.total_product = response.data.total_product;
                $scope.new_client = response.data.new_client;
                $scope.case_study = response.data.case_study;
                $scope.quote = response.data.quote;
                $scope.loading = false;
                $(".preloader").fadeOut();
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