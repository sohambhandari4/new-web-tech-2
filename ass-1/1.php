
<?php

$client_ip = $_SERVER['REMOTE_ADDR'];
$browser_info = $_SERVER['HTTP_USER_AGENT'];
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

echo "Client IP Address: $client_ip <br>";
echo "Browser Information: $browser_info <br>";
echo "Protocol: $protocol";
?>
