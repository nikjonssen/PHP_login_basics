<?php

if (isset($_POST['login'])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (imptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    } else {
        loginUser($connection, $username, $pwd);
    }
} else {
    header("location: ../login.php");
    exit();
}
