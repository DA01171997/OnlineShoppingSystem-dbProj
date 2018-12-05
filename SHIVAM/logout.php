<?php

   
   if(session_destroy()) {
      header("Location: login_new.php");
   }
?>