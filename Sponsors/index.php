<?php
$upOne = realpath(dirname(__FILE__) . '/..');
include $upOne . '/SiteWideData/initialscripts.php';
?>

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
        $this->key    = $key;
        $this->secret = $secret;
        $this->token  = $token;
    }
    
    public function request($type, $request, $args = false)
    {
        if (!$args) {
            $args = array();
        } elseif (!is_array($args)) {
            $args = array(
                $args
            );
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
        if (count($args))
            curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($args));
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

function returnSponsorData($key, $secret, $token, $board_id, $list_id, $amount = null)
{
    $trello       = new trello_api($key, $secret, $token);
    $trelloCards  = $trello->request('GET', ('/1/lists/' . $list_id . '/cards?fields=all'));
    $trelloData   = '';
    $amountPosted = 0;
    $sponsorLevel = '';
    foreach ($trelloCards as $card) {
        $displayCard = false;
        foreach ($card->labels as $label) {
            if ($label->name == 'Display') {
                $displayCard = true;
            }
        }

        $checkItems = $trello->request('GET', ('/1/cards/' . $card->id . '/checkItemStates?fields=all'));
        foreach ($checkItems as $item) {
            $sponsorLevelData = $trello->request('GET', ('/1/cards/' . $card->id . '/checkItem/' . $item->idCheckItem . '?fields=all'));
            $sponsorLevel = $sponsorLevelData->name;
        }//Left off here
        
        if ($displayCard) {
            $trelloData .= '<div class="trellocard panel">';
            $trelloData .= '<p class="sponsorLevel ' . $sponsorLevel . '">' . $sponsorLevel . ' Level Sponsor</p>';
            $trelloData .= '<h2>' . $card->name . '</h2>';
            foreach ($card->idMembers as $memberid) {
                $memberinfo = $trello->request('GET', ('/1/members/' . $memberid . '?fields=all'));
                $trelloData .= '<h4>' . $memberinfo->fullName . '</h4>';
            }
            
            $trelloData .= '<img class="sponsorlogo" src="' . $card->desc . '">';
            $trelloData .= '</div>';
            $amountPosted += 1;
        }
        
        if ($amount != null && $amountPosted >= $amount) {
            break;
        }
    }
    
    return '<div class="column trellocardsholder">' . $trelloData . '</div>';
    unset($trello);
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>News: TW 5518</title>
    <?php include $head;?>
</head>

<body>
    <?php include $navbar;?>
    <?php include 'content.php';?>
    <?php include $footer;?>
</body>