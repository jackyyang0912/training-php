<?php
   session_start();
   session_destroy();
   header("Location: http://localhost/training-php/website.com/login.php");
?>