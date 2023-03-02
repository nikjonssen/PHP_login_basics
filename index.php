<?php include "header.php"?>
    <title>Home</title>
</head>
<body>
<?php include_once 'components/navbar.php'?>
<div class="main">
<?php
if (isset($_SESSION['useruid'])) {
    echo "<p class='welcome'>Welcome {$_SESSION['useruid']}</p>";
}
?>
    <h1>Home Page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nisi neque repellendus consequuntur molestias suscipit omnis rem. Alias, voluptatum aut!</p>
</div>
<?php include_once 'footer.php'?>

