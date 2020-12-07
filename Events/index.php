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

function returnnewsdata($key, $secret, $token, $board_id, $bloglistid, $amount = null)
{

    $trello = new trello_api($key, $secret, $token);
    $blogdata = '';

    $blogcards = $trello->request('GET', ('/1/lists/' . $bloglistid . '/cards?fields=all'));

    $amountPosted = 0;
    foreach ($blogcards as $card) {
        $displayCard = false;
        foreach ($card->labels as $label) {
            if ($label->name == 'Display') {
                $displayCard = true;
            }
        }
        if ($displayCard) {
            $blogdata .= '<div class="trellocard panel">';
            $blogdata .= '<h4>' . date("F d, Y", strtotime(substr($card->due, 0, 10))) . '</h4>';
            $blogdata .= '<h2>' . $card->name . '</h2>';
            foreach ($card->idMembers as $memberid) {
                $memberinfo = $trello->request('GET', ('/1/members/' . $memberid . '?fields=all'));
                $blogdata .= '<h4>' . $memberinfo->fullName . '</h4>';
            }
            $blogdata .= '<p>' . $card->desc . '</p>';
            $blogdata .= '</div>';
            $amountPosted += 1;
        }
        if ($amount != null && $amountPosted >= $amount) {
            break;
        }
    }

    return '<div class="column trellocardsholder">' . $blogdata . '</div>';
    unset($trello);
}

?>

    <!DOCTYPE html>

    <html lang="en">

    <head>
        <title>Events: TW 5518</title>
        <?php include $head; ?>
    </head>

    <body>
        <?php include $navbar; ?>
        <?php include 'content.php'; ?>
        <?php include $footer; ?>
    </body>