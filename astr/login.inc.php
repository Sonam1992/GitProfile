<?php

if (isset($_POST["signin-submit"])) {

    $username = $_POST['emp_id'];
    $pwd = $_POST['pwd'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptycreds($username,$pwd)!== false){
        header("location: signin.php?error=emptyinput#SignIn");
        exit();
    }

    loginUser($conn, $username , $pwd);

}
else
{
    header("location: signin.php");
    exit();
}