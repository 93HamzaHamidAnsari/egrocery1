<?php

session_start();
session_destroy();
header('Location:my_admin/admin_login.php');
?>

