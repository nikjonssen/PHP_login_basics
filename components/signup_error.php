<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p class='signup-error'>Please, fill in all fields!</p>";
    } else if ($_GET["error"] == "invaliduid") {
        echo "<p class='signup-error'>Username must consist of letters, numbers and underscore only!</p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p class='signup-error'>Please enter correct email address!</p>";
    } else if ($_GET["error"] == "passunmatch") {
        echo "<p class='signup-error'>Passwords do not match!</p>";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "<p class='signup-error'>Something went wrong, please try again!</p>";
    } else if ($_GET["error"] == "uernametaken") {
        echo "<p class='signup-error'>Username already taken!</p>";
    } else if ($_GET["error"] == "none") {
        echo "<p class='signup-error'>Signed Up!</p>";
    }
}
