<?php

if (isset($_POST['signup'])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrep = $_POST['pwdrep'];

    if (imptyInputSignup($name, $email, $uid, $pwd, $pwdrep) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($uid) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrep) !== false) {
        header("location: ../signup.php?error=passunmatch");
        exit();
    }
    if (uidExists($connection, $uid, $email) !== false) {
        header("location: ../signup.php?error=uernametaken");
        exit();
    }

    createUser($connection, $name, $email, $uid, $pwdrep);

} else {
    header("location: ../signup.php");
    exit();
}
