<?php
session_start();
session_destroy();
echo "<script> alert('Log out successful') </script>";
echo " <script> window.location.href='index.html'; </script> ";
?>