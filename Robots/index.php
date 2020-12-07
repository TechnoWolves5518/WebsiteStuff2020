<?php
$upOne = realpath(dirname(__FILE__) . '/..');
include $upOne . '/SiteWideData/initialscripts.php';
?>

<?php

function returnrobotscontent(){
    $xml=simplexml_load_file("https://raw.githubusercontent.com/TechnoWolves5518/websitedata/master/robots.xml") or die("Error: Cannot create object");
    $robotscontent = '';
    foreach ($xml->robot as $robot){

        $robotscontent .= 
        '
        <div class="containerwrapper">
            <div class="container">
                <div class="row">
                    <div class="column robots">
                        <h2>' . $robot->name . '</h2>
                        <h3>'. $robot->year .' Competition Robot</h3>
                        <p>' . $robot->description . '</p>
                        <ol>';
                            foreach ($robot->features->feature as $feature){
                                $robotscontent .= '<li>'.$feature.'</li>';
                            }
                        $robotscontent.='<ol>
                    </div>
                    <div class="column">
                        <div class="image robotimage">
                            <img src="' . $robot->imagelink . '">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    return $robotscontent;
}


?>


<!DOCTYPE html>

<html lang="en">

<head>
    <title>TW Template Mod</title>
    <?php include $head;?>
</head>

<body>
    <?php include $navbar;?>
    <?php include 'content.php';?>
    <?php include $footer;?>
</body>