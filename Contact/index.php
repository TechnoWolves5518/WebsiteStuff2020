<?php
$upOne = realpath(dirname(__FILE__) . '/..');
include $upOne . '/SiteWideData/initialscripts.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Contact: TW 5518</title>
    <?php include $head;?>
</head>

<body>
    <?php include $navbar;?>
    <?php include 'content.php';?>
    <?php include $footer;?>
</body>