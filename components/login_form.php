<?php
$firstVal = $_GET['first'] ?? '';
$lastVal = $_GET['last'] ?? '';
$uidVal = $_GET['uid'] ?? '';

echo '<form class="signup_form" action="includes/login.inc.php" method="POST">
    <h1 class="signup_form_title">Log In</h1>
    <input class="signup_form_input" type="email" name="email" placeholder="Username / E-mail...">
    <input class="signup_form_input" type="password" name="pwd" placeholder="Password...">
    <button class="signup_form_button" type="submit" name="login">Log In</button>
</form>';
