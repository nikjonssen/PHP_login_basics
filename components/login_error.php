<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p class='login-error'>Please, fill in all fields!</p>";
    } else if ($_GET["error"] == "usrnone") {
        echo "<p class='login-error'>User do not exist!</p>";
    } else if ($_GET["error"] == "wrongpwd") {
        echo "<p class='login-error'>Please enter correct password!</p>";
    }
}
