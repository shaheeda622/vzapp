
'use strict';
var baseURL = '';
var northwindApp = angular.module('northwindApp', ['kendo.directives', 'ngRoute'])


    .config(function ($routeProvider)
    {
        
       
        $routeProvider

            .when('/home/about',
            {
                templateUrl: baseURL + '/home/about',
                controller: 'aboutController'
            })
              .when('/home/changepwd',
            {
                templateUrl: baseURL + '/home/changepwd',
                controller: 'changepwdController'
            })
           .when('/home/profile',
            {
                templateUrl: baseURL + '/home/profile',
                controller: 'profileController'
            })
            .when('/home/editprofile',
            {
                templateUrl: baseURL + '/home/editprofile',
                controller: 'editprofileController'
            })
            .when('/docs/dummyview',
            {
                templateUrl: baseURL + '/docs/dummyview',
                controller: 'dummyviewController'
            })
            .when('/home',
            {
                templateUrl: baseURL + '/home/home',
                controller: 'homeController'
            })

            .when('/docs',
            {
                templateUrl: baseURL + '/docs/statementofaccts',
                controller: 'statementofacctsController'
            })

           .when('/docs/statementofaccts',
            {
                templateUrl: baseURL + '/docs/statementofaccts',
                controller: 'statementofacctsController'
            })

            .when('/docs/paidinvoice',
            {
                templateUrl: baseURL + '/docs/paidinvoice',
                controller: 'paidinvoiceController'
            })

             .when('/docs/unpaidinvoices',
            {
                templateUrl: baseURL + '/docs/unpaidinvoices',
                controller: 'unpaidinvoicesController'
            })

            .when('/docs/schedpay',
            {
                templateUrl: baseURL + '/docs/schedpay',
                controller: 'schedpayController'
            })
              .when('/shared/error',
            {
                templateUrl: baseURL + '/shared/error',
                controller: 'errorController'
            })

               .when('/admin/userlog',
            {
                templateUrl: baseURL + '/admin/userlog',
                controller: 'userlogController'
            })

             .when('/admin/PaymentLog',
            {
               
                templateUrl: baseURL +  '/admin/Paymentlog',
                controller: 'paymentlogController'
            })
            .when('/admin/SchedPayments',
            {

                templateUrl: baseURL + '/admin/SchedPayments',
                controller: 'schedpaymentsController'
            })
             .when('/admin/ApproveProfile',
            {

                templateUrl: baseURL + '/admin/ApproveProfile',
                controller: 'approveprofileController'
            })
             .when('/admin/Approve',
            {

                templateUrl: baseURL + '/admin/ApproveProfile',
                controller: 'approveprofileController'
            })

            .when("/admin/ApproveProfile/:Status", {
                controller: "approveprofileController",
                templateUrl: function (params) {
                    return baseURL + "/admin/ApproveProfile/" + params.Status;
                }
            })
           .when("/home/profile/:Status", {
               controller: "profileController",
                 templateUrl: function (params) {
                     return baseURL + "/home/profile/" + params.Status;
                 }
             })
            .when('/pay/auth',
            {

                templateUrl: baseURL + '/pay/auth',
                controller: 'authController'
            })

            .when('/pay/cancel',
            {

                templateUrl: baseURL + '/pay/cancel',
                controller: 'cancelController'
            })

             .when('/pay/decl',
            {

                templateUrl: baseURL + '/pay/decl',
                controller: 'declController'
            })

            .when('/customer',
            {
                templateUrl: '/customer',
                controller: 'customerController'
            })
            .when('/customer/edit/:id',
            {
                templateUrl: '/customer/edit',
                controller: 'customerEditController'
            })
            .when('/help',
            {
                templateUrl: '/help'
            })
             .when('/user/login',
            {
                templateUrl: '~/'
            })


            .otherwise(
            {
                redirectTo:  '/home'
            });
        
    });

northwindApp.run(function ($rootScope, $templateCache, $location) {
    $rootScope.$on('$routeChangeStart', function (event, next, current) {
       
        if (typeof (current) !== 'undefined' && ($location.url() == '/home/editprofile' || $location.url() == '/admin/ApproveProfile' || $location.url() == '/home/profile')) {
          //  alert('here');
            $templateCache.remove(''+$location.url());
           
        }
    });
});