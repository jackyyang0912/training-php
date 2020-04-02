
<?php

    //username password =>check db => isLogin = true , false
    

?>
<html>
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="http://localhost/training-php/website.com/public/login.css">
      <style>
      </style>  
   </head>
   
<body>
    </div>
    <form action="" method="post">
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="key">

            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="password">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>
</html>
