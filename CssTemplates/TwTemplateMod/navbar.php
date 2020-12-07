<?php
$rootPath = "http://shodor.org/~aneeshs/sitetest/Website/root/";

$navbarImageLocation = $rootPath . 'CssTemplates/TwTemplateMod/navbarassets/letterhead.png';

$navbarLinks = array(
    "Home"      =>"",
    "About"     =>"",
    "Sponsors"  =>"",
    "Media"     =>"",
    "Resources" =>"",
    "Contact"   =>"",
    "Events"    =>""
);

// DO NOT TOUCH ANYTHING UNDER THIS UNLESS YOU KNOW WHAT YOU ARE DOING.

$navbarImageHtml = '
    <li id="navbarimage">
        <img src=' . $navbarImageLocation . ' alt="5518: Techno Wolves">
    </li>';

$navbarLinksHtml = "";
foreach ($navbarLinks as $name => $link){
    $navbarLinksHtml .= '                    
        <li>
            <a href="'.$link.'">'.$name.'</a>
        </li>';
}


?>

<div class="containerwrapper" id="navbarwrapper">
    <div class="container">
        <div class="row">
            <div class="column">
                <ol id="navbaritems">
                    <?php echo $navbarImageHtml; ?>
                    <?php echo $navbarLinksHtml; ?>
                </ol>
            </div>
        </div>
    </div>
</div>