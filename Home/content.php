<?php
    // Trello API Information. 
    // Just get an account key, secret, and token from Trello (can be found with a quick google search). 
    // Then put them in below!
    $key='24e739b901773ddd815a5663234b6a80';
    $secret='8c55a5806686ee9cb41122f2bff72e84f93619464645d1d45762fcae6122b470';
    $token='ba2971ef8fcaceb79d24ad57472a0790d83f6ea250c46a0e22d5bed79a23f88a';
?>


<div class="containerwrapper pageheader">
        <div class="video">
        <iframe src="https://www.youtube.com/embed/videoseries?list=PLqXG_fh2uDO2k3al75-5PVs-oLuTWi_89&autoplay=1&controls=0&loop=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        </div>
    <div class="container">
        <div class="row">
            <div class="column">
                <img src="/CssTemplates/TwTemplateMod/navbarassets/letterheadnumber.png" alt="Techno Wolves: FRC #5518">
            </div>
        </div>
    </div>
</div>
<div class="containerwrapper" id="welcome">
    <div class="container">
        <div class="row">
            <div class="column" id="welcomeexcerpt">
                <div id="welcomeexcerptspacer1">

                </div>
                <h2>Welcome</h2>
                <p>Founded in 2013, the Techno Wolves is a student-led FIRST Robotics Competition team based in Apex, North
                    Carolina. We not only plan on building an awesome robot, but also aim to build a better future by
                    enriching our community through STEAM, robotics, leadership, and business management skills alongside
                    the core values of FIRST, such as Gracious Professionalism® and Coopertition®.</p>
                <p class="button">
                    <a href= "../About">Read More</a>
                </p>
                <div id="welcomeexcerptspacer2">

                </div>
            </div>
            <div class="column" id="welcomespacer1">

            </div>
            <div class="column overlay" id="welcomeimage">
                <img src="assets/wolfbytewithdriveteam.jpg" alt="robot">
            </div>
        </div>
    </div>
</div>
<div class="containerwrapper" id="recentnews">
    <div class="container">
        <div class="row">
            <div class="column" id="headerrecentnews">
                <h2>Recent News</h2>
                <p class="button">
                <a href= <?php echo '../News' ?>>All News</a>
                </p>
            </div>
        </div>
        <div class="row">
            <?php 
                //This snippet returns list data, including column wrappers.
                //It needs the following trello info: Key, Secret, Token, BoardId, ListId
                echo returnnewsdata($key, $secret, $token, '5c583a5d1e82306b7256e24b', '5c583a777fa42f7cfccedbb0', 1); 
            ?>
            <?php 
                //This snippet returns list data, including column wrappers.
                //It needs the following trello info: Key, Secret, Token, BoardId, ListId
                echo returnnewsdata($key, $secret, $token, '5c583a5d1e82306b7256e24b', '5c583a7c4bf5336153e3d345', 1); 
            ?>
        </div>
    </div>

</div>
<!-- <div class="containerwrapper" id="creations">
    <div class="container">
        <div class="row">
            <div class="column">

                <h2>Meet Wolfbyte</h2>
                <div class="image">
                    <img src="assets/wolfbyte.jpg">
                </div>
                <p>2017-18 Competition Robot</p>
                <p class="button">
                    <a href="">Read More</a>
                </p>
            </div>
            <div class="column">
                <h2>NC FRC Alliance</h2>
                <div class="image">
                    <img src="assets/ncfrcalliancelogo.png">
                </div>
                <p>A communication tool set up by us allowing for instant communication between teams across North Carolina.</p>
                <p class="button">
                    <a href="">Read More</a>
                </p>
            </div>
        </div>
    </div>
</div> -->