<?php
    // Trello API Information. 
    // Just get an account key, secret, and token from Trello (can be found with a quick google search). 
    // Then put them in below!
    $key='24e739b901773ddd815a5663234b6a80';
    $secret='8c55a5806686ee9cb41122f2bff72e84f93619464645d1d45762fcae6122b470';
    $token='ba2971ef8fcaceb79d24ad57472a0790d83f6ea250c46a0e22d5bed79a23f88a';
?>

<div class="containerwrapper">
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>Upcoming Events</h1>
            </div>
        </div>
    </div>
</div>


<div class="containerwrapper">
    <div class="container">
        <div class="row">
            <?php 
            //This snippet returns list data, including column wrappers.
            //It needs the following trello info: Key, Secret, Token, BoardId, ListId
            echo returnnewsdata($key, $secret, $token, '5c583a5d1e82306b7256e24b', '5c61c6475ebf4354409c6960'); 
            ?>
        </div>
    </div>
</div>

