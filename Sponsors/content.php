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
                <h1>Our Sponsors</h1>
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
            echo returnSponsorData($key, $secret, $token, '5c583a5d1e82306b7256e24b', '5c5e0fac236ff10e0583793a'); 
            ?>
        </div>
    </div>
</div>
<div class="containerwrapper">
    <div class="container">
        <div class="row">
            <div class="column" id="headerhelpus">
                <h3>Help the Team</h3>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="LUVU5764NJU7Q" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                </form>
                <p class="button">
                    <a href="../Contact">Contact</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="panel">
                    <h4>Monetary Donations</h4>
                    <p>We are supported by the Techno Wolves Robotics Booster Club, a registered 501(c)(3) nonprofit organization.
                        Our projected budget for the 2016 season can be found here. All donations are 100% tax deductible.
                        If you are interested in donating, click the button above to donate through PayPal or send us
                        a check.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="panel">
                    <h4>Mentorship</h4>
                    <p>Our team is always seeking guidance in Engineering areas such as CAD, fabrication, programming, and
                        electrical as well as Business areas such as marketing, media, fundraising, and outreach.</p>
                </div>
            </div>
            <div class="column">
                <div class="panel">
                    <h4>Sponsorship</h4>
                    <p>Corporate sponsors are one of the most prominent sources of funding for our team. Therefore, we accept
                        monetary donations of any amount as well as in-kind donations such as materials, parts, tools,
                        and services. For more information, feel free to look at our team sponsorship packet (Resources page) or contact
                        us.
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="panel">
                    <h4>Supplies and Tool Donations</h4>
                    <p>Some tools that we need are an angle grinder, a handheld jigsaw, a lathe, a milling machine, a 3D printer, a dremel, and a rivet gun. If you
                        are interested in donating tools or supplies, feel free to contact us.</p>
                </div>
            </div>

        </div>
    </div>
</div>

