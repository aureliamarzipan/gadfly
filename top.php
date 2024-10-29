<?php 
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The Gadfly</title>
    <meta name="author" content="The Gadfly Collective">
    <meta name="description" content="The gadfly is a student alternative newspaper at the University of Vermont">
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" href="css/layout-desktop.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" href="css/layout-tablet.css?version=<?php print time(); ?>" type="text/css" media="(max-width: 800px)">
    <link rel="stylesheet" href="css/layout-phone.css?version=<?php print time(); ?>" type="text/css" media="(max-width: 600px)">
</head>

<?php
print '<body class=">' . $pathParts['filename'] . '">';

include 'database-connect.php';
include 'header.php';
include 'nav.php';
?>