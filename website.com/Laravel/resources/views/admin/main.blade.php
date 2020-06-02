<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Web.Admin-Laravel</title>
<style>
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    right: 0;
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
</style>
</head>
<body>
    <div class="dashboard-main-wrapper">


        @include("admin.elements.navbar");                   

        @include("admin.elements.sidebar");
 

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                @yield('content')
 
                </div>
            </div>
        </div>
    </div>
           
        @include("admin.elements.footer");
         
    <script src="admin/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
</body>
</html>