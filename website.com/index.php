<?php
session_start();
?>
<html">
   <head>
      <title>Welcome </title>
   </head>
   <body>
      <h1>Welcome <?php echo $_SESSION["username"]; ?> Log in succesed , Now you can use the website ! </h1> 
      <h3>Click here to <a href = "logout.php">Log Out</a></h2>
   </body>
   
</html>