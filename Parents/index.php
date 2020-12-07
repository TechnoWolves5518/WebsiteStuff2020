<?php
$upOne = realpath(dirname(__FILE__) . '/..');
include $upOne . '/SiteWideData/initialscripts.php';
?>

<?php
class trello_api
{
    private $key;
    private $secret;
    private $token;

    public function __construct($key, $secret, $token)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->token = $token;
    }

    public function request($type, $request, $args = false)
    {
        if (!$args) {
            $args = array();
        } elseif (!is_array($args)) {
            $args = array($args);
        }

        if (strstr($request, '?')) {
            $url = 'https://api.trello.com' . $request . '&key=' . $this->key . '&token=' . $this->token;
        } else {
            $url = 'https://api.trello.com' . $request . '?key=' . $this->key . '&token=' . $this->token;
        }

        $c = curl_init();
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c, CURLOPT_VERBOSE, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);

        if (count($args)) curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($args));

        switch ($type) {
            case 'POST':
                curl_setopt($c, CURLOPT_POST, 1);
                break;
            case 'GET':
                curl_setopt($c, CURLOPT_HTTPGET, 1);
                break;
            default:
                curl_setopt($c, CURLOPT_CUSTOMREQUEST, $type);
        }

        $data = curl_exec($c);
        curl_close($c);

        return json_decode($data);
    }
}

function getVolunteerRequests($key, $secret, $token) {

    class volunteer_request
    {
        var $name;
        var $date;
        var $description;
        var $link;
        var $subItems;

        public function initValues($rname, $rdate, $rdescription, $rlink) {
            $this->name = $rname;
            $this->date = $rdate;
            $this->description = $rdescription;
            $this->link = $rlink;
        }

    }

    class sub_item
    {
        var $name;
        var $desc;
        var $url;
    }

    
    $volRequests = array();
    
    $listId = '5d596e39fa07c5799654708c';
    $trello = new trello_api($key, $secret, $token);
    $cards = $trello->request('GET', ('/1/lists/' . $listId . '/cards?fields=all&customFieldItems=true&attachments=true'));

    $rName = '';
    $rDate = '';
    $rDescription = '';
    $rLink = '';
    
    foreach ($cards as $card) {
        $volRequests[$card->id] = new volunteer_request;
        
        foreach ($card->customFieldItems as $field) {
            if ($field->idCustomField == '5d596f6284d61641f8459a4f') {
                $rLink = $field->value->text;
            } else if ($field->idCustomField == '5d596f54d2774846a2382290') {
                $rDescription = $field->value->text;
            } else if ($field->idCustomField == '5d596f1ef3827e4411e7c4c8') {
                $rDate = $field->value->text;
            } else if ($field->idCustomField == '5d596f08503c592cae38f2ab') {
                $rName = $field->value->text;
            }
        }

        $volRequests[$card->id]->initValues($rName, $rDate, $rDescription, $rLink);
        
        $subItems = array();
        foreach ($card->attachments as $attachment) {
            $subItems[$attachment->id] = new sub_item;

            preg_match('/\[name\]\((.*?)\)/', $attachment->name, $attName);
            $subItems[$attachment->id]->name = $attName[1];

            preg_match('/\[desc\]\((.*?)\)/', $attachment->name, $attDesc);
            $subItems[$attachment->id]->desc = $attDesc[1];

            $subItems[$attachment->id]->url = $attachment->url;
        }

        $volRequests[$card->id]->subItems = $subItems;


        
    }

    foreach ($volRequests as $id => $request) {
        
        echo ('
        <div class="panel signup">
            <p class = "signupdate">'.$request->date.'</p>
            <div class = "signupmain">
                <h1>'.$request->name.'</h1>
            </div>
            <p>'.$request->description.'</p>
        
        ');

        foreach ($request->subItems as $sId => $subItem) {

            echo ('
            <div class = "panel subitem">
                <div class = "signupmain">
                    <h1>'.$subItem->name.'</h1>
                    <a class = "button" href = "'.$subItem->url.'">Link</a>
                </div>
                <p>'.$subItem->desc.'</p>
            </div>');

        }

        echo '</div>';
    
    }
}

function getCarpoolEvents($key, $secret, $token) {

    class carpool_event
    {
        var $name;
        var $date;
        var $description;
        var $link;

        public function initValues($rname, $rdate, $rdescription, $rlink) {
            $this->name = $rname;
            $this->date = $rdate;
            $this->description = $rdescription;
            $this->link = $rlink;
        }

    }
    
    $carEvents = array();
    
    $listId = '5d5ae0ac366fd97dae6b6d38';
    $trello = new trello_api($key, $secret, $token);
    $cards = $trello->request('GET', ('/1/lists/' . $listId . '/cards?fields=all&customFieldItems=true'));

    $rName = '';
    $rDate = '';
    $rDescription = '';
    $rLink = '';
    
    foreach ($cards as $card) {
        $carEvents[$card->id] = new carpool_event;
        
        foreach ($card->customFieldItems as $field) {
            if ($field->idCustomField == '5d5ae0ac366fd97dae6b6d75') {
                $rLink = $field->value->text;
            } else if ($field->idCustomField == '5d5ae0ac366fd97dae6b6d73') {
                $rDescription = $field->value->text;
            } else if ($field->idCustomField == '5d5ae0ac366fd97dae6b6d71') {
                $rDate = $field->value->text;
            } else if ($field->idCustomField == '5d5ae0ac366fd97dae6b6d6f') {
                $rName = $field->value->text;
            }
        }

        $carEvents[$card->id]->initValues($rName, $rDate, $rDescription, $rLink);
    }

    foreach ($carEvents as $id => $event) {
        
        echo ('
        <div class="panel signup">
            <p class = "signupdate">'.$event->date.'</p>
            <div class = "signupmain">
                <h1>'.$event->name.'</h1>
                <a class = "button" href = "'.$event->link.'">Sign Up</a>
            </div>
            <p>'.$event->description.'</p>
        </div>
        ');
    
    }
}



?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>About: TW 5518</title>
    <?php include $head; ?>
</head>

<body>
    <?php include $navbar; ?>
    <?php include 'content.php'; ?>
    <?php include $footer; ?>
</body>