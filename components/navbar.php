<div class="nav_wrapper">
    <a class="logo_link" href="index.php"><img id="brand_logo" src="img/circle.png" alt="Brand Logo"></a>
    <ul class="nav_list">
        <li><a class="navlink" href="index.php">Home</a></li>
        <li><a class="navlink" href="about.php">About</a></li>
        <li><a class="navlink" href="blogs.php">Blogs</a></li>
        <?php
if (isset($_SESSION['useruid'])) {
    echo "<li><a class='navlink' href='profile.php'>Profile</a></li>";
    echo "<li><a class='navlink' href='includes/logout.inc.php'>Log Out</a></li>";
} else {
    echo "<li><a class='navlink' href='signup.php'>Sign Up</a></li>";
    echo "<li><a class='navlink' href='login.php'>Log In</a></li>";
}
?>
    </ul>
</div>
