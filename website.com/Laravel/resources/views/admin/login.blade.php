<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a><img class="logo-img" >WEBSITE.COM</a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        
                    </ul>
                </div>
            @endif
            @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
                <form action="admin/login" method="POST">
                @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>

        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="admin/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="admin/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="admin/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="admin/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="admin/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="admin/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="admin/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="admin/assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>