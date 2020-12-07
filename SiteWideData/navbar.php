<?php
include 'initialscripts.php';

$navbarImageLocation = '/CssTemplates/TwTemplateMod/navbarassets/wolfhead.png';
// $navbarImageLocation = 'https://cdn.discordapp.com/attachments/374407469218267138/534942107274838016/TechnoWolvesSupreme.png';

$navbarLinks = array(
    "Home"      =>"/Home",
    "About"     =>"/About",
    "Sponsors"  =>"/Sponsors",
    "News"      =>"/News",
    "Resources" =>"/Resources",
    // "Robots" =>"/Robots",
    "Contact"   =>"/Contact",
    // "Events"    =>"/Events"
    "Parents"   =>"/Parents"
);

// DO NOT TOUCH ANYTHING UNDER THIS UNLESS YOU KNOW WHAT YOU ARE DOING.

$navbarImageHtml = '
        <img src=' . $navbarImageLocation . '>
    ';

$navbarLinksHtml = "";
foreach ($navbarLinks as $name => $link){
    $navbarLinksHtml .= '                    
        <li class="nav-item">
            <a class="nav-link" href="'.$link.'">'.$name.'</a>
        </li>';
}


?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #c00;">
  <a class="navbar-brand" href="#">
    <?php echo $navbarImageHtml; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php echo $navbarLinksHtml; ?>
    </ul>
  </div>
</nav>
<!--
<div class="containerwrapper" id="navbarwrapper">
    <div class="container">
        <div class="row">
            <div class="column">
                <ol id="navbaritems">
                    <?php //echo $navbarImageHtml; ?>
                    <?php //echo $navbarLinksHtml; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
-->