<?php
require('vendor/autoload.php');

$url = parse_url(getenv('m16.cloudmqtt.com'));
$topic = substr($url['/ESP/relay'], 1);

$client_id = "phpMQTT-subscriber";

function procmsg($topic, $msg){
  echo "Msg Recieved: $msg\n";
}
    
$mqtt = new Bluerhinos\phpMQTT($url['m16.cloudmqtt.com'], $url['17495'], $client_id);
if ($mqtt->connect(true, NULL, $url['cszwalpv'], $url['Gqxx2jCFxwsR'])) {
  $topics[$topic] = array(
      "qos" => 0,
      "function" => "procmsg"
  );
  $mqtt->subscribe($topics,0);
  while($mqtt->proc()) {}
  $mqtt->close();
} else {
  exit(1);
}

