<?PHP

include 'GEORedirect/location.php';
include 'GEORedirect/ipapi.php';

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

use IpApi\IpApi;

$api = new IpApi();

$location = $api->locate($user_ip);

$decide_where = $location->countryCode;

if (strpos($decide_where, 'ZA') !== false) {
    header("Location: https://www.thoughtware.co.za/index.html");
}
else if (strpos($decide_where, 'AU') !== false) {
    header("Location: https://www.thoughtwaresolutions.com.au/index.html");
}
else if (strpos($decide_where, 'GB') !== false) {
    header("Location: https://www.thoughtware.eu/index.html");
}
else if (strpos($decide_where, 'ES') !== false) {
    header("Location: https://www.thoughtware.es/index.html");
}
else
{
    header("Location: https://www.thoughtwaresolutions.com/index.html");
}

?>
