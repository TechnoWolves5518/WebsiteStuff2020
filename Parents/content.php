<?php
    // Trello API Information. 
    // Just get an account key, secret, and token from Trello (can be found with a quick google search). 
    // Then put them in below!
    $key='24e739b901773ddd815a5663234b6a80';
    $secret='8c55a5806686ee9cb41122f2bff72e84f93619464645d1d45762fcae6122b470';
    $token='ba2971ef8fcaceb79d24ad57472a0790d83f6ea250c46a0e22d5bed79a23f88a';


?>


<div class="containerwrapper" id="pageheader">
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>Parent Portal</h1>
            </div>
        </div>
    </div>
</div>

<div class="containerwrapper volunteerop">
    <div class="container">
        <div class = "row">
            <div class =  "column">
                <h1>Event Information</h1>
            </div>
        </div>
        <div class="row">
            <div class="column volrequests">
                <?php getVolunteerRequests($key, $secret, $token);?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="containerwrapper carpool">
    <div class="container">
        <div class = "row">
            <div class =  "column">
                <h1>Carpool Information</h1>
            </div>
        </div>
        <div class="row">
            <div class="column carrequests">
                <?php getCarpoolEvents($key, $secret, $token);?>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="containerwrapper boosterclub">
    <div class="container">
        <div class = "row">
            <div class =  "column">
                <h1>Booster Club</h1>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="panel">
                    <img src = "https://randomuser.me/api/portraits/men/29.jpg">
                    <h1>John Doe</h1>
                    <h2>President</h2>
                    <p>jdoe@ncsu.edu</p>
                </div>
            </div>
            <div class="column">
                <div class="panel">
                    <h1>30</h1>
                    <p>Active Members</p>
                </div>
            </div>
            <div class="column">
                <div class="panel">
                    <h1>08</h1>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>
</div> -->

