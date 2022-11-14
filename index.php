<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    "dd03c6a0b9b04cbb8710efe538535e51",
    "3c12260a232c4415a0650922d4c9276f"
);
$api = new SpotifyWebAPI\SpotifyWebAPI();
$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();
$api->setAccessToken($accessToken);

$results = $api->search('緑黄色社会', 'artist');
foreach ($results->artists->items as $artist) {
    echo $artist->name, '<br>';
}
?>

