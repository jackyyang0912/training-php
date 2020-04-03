<?php
session_start();
$_SESSION['message'] = "";
$message="";


   
if(isset($_POST['username']) && isset($_POST['password'])){
    require_once ('./libs/database.php');
    $connect = connect_db();

      //Validate dữ liệu trên server side
      $username = mysqli_real_escape_string($connect,$_POST['username']);
      $password = mysqli_real_escape_string($connect,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($connect,$sql);
      
      // If result matched $username and $password, table row must be 1 row
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION["is_login"] = true;
         $_SESSION["username"] = $username;
         header("location: http://localhost/training-php/website.com/admin/product");
      }else {
          
        $message= "Name or Password is invalid !!";
      }
    }
?>
<html>

   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="http://localhost/training-php/website.com/public/login.css">
      <style>
      </style>  
   </head>
   
<body>
    <form action="" method="post">
        <div class="container">
            <h3>Log in<h3>
            <h4><i><?php echo $message; ?></i><h4>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password </b></label>
            <input type="password" placeholder="Enter Password" name="password" required><br>

            <button type="submit">Login</button><br>
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
