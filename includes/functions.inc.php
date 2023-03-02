<?php

include_once 'dbh.inc.php';

// Signup functions
function imptyInputSignup($name, $email, $uid, $pwd, $pwdrep)
{
    $result;
    if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdrep)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function invalidUsername($uid)
{
    $result;
    $regex = "/^[a-zA-Z0-9_]*$/";
    if (!preg_match($regex, $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function pwdMatch($pwd, $pwdrep)
{
    $result;
    if ($pwd !== $pwdrep) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function uidExists($connection, $uid, $email)
{
    $sql = "SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
};

function createUser($connection, $name, $email, $uid, $pwdrep)
{
    $sql = "INSERT INTO users (users_name, users_email, users_uid, users_pwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    } else {
        $hashedPwd = password_hash($pwdrep, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit();
    }
};

// Login functions
function imptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};

function loginUser($connection, $username, $pwd)
{
    $uidExists = uidExists($connection, $username, $username);
    if (!$uidExists) {
        header("location: ../login.php?error=usrnone");
        exit();
    } else {
        $pwdHashedDb = $uidExists["users_pwd"];
        $checkPwd = password_verify($pwd, $pwdHashedDb);
        if ($checkPwd === false) {
            header("location: ../login.php?error=wrongpwd");
            exit();
        } else if ($checkPwd === true) {
            session_start();
            $_SESSION['userid'] = $uidExists["users_id"];
            $_SESSION['useruid'] = $uidExists["users_uid"];
            header("location: ../index.php");
            exit();
        }
    }
}
