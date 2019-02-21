<?php
require('vendor/autoload.php');

$url = parse_url(getenv('m16.cloudmqtt.com'));
$topic = substr($url['/ESP/realy'], 1);
$client_id = "phpMQTT-publisher";

$message = "Hello CloudMQTT!";

$mqtt = new Bluerhinos\phpMQTT($url['m16.cloudmqtt.com'], $url['17495'], $client_id);
if ($mqtt->connect(true, NULL, $url['cszwalpv'], $url['Gqxx2jCFxwsR'])) {
    $mqtt->publish($topic, $message, 0);
    echo "Published message: " . $message;
    $mqtt->close();
}else{
    echo "Fail or time out<br />";
}
