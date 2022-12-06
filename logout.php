<?php
error_reporting(0);
@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:login_form.php');
