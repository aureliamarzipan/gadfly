<?php 
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>

<nav>
    <a href="index.php"><img src="images/gadfly-icon.png" alt="The Gadfly's mascot, a gadfly"></a>
    <a class="
    <?php 
    if ($pathParts['filename'] == 'index') {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>
    <a class="
    <?php
    if ($pathParts['filename'] == 'news') {
        print 'activePage';
    }
    ?>" href="news.php">News</a>
    <a class="
    <?php
    if ($pathParts['filename'] == 'about') {
        print 'activePage';
    }
    ?>" href="about.php">About</a>
    <a class="
    <?php
    if ($pathParts['filename'] == 'join') {
        print 'activePage';
    }
    ?>" href="join.php">Join</a>
</nav>