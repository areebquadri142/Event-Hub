<?php

@include 'config2.php';

session_start();
session_unset();
session_destroy();

header('location:login_form.php');

?>