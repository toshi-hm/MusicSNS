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


// アーティストIDを取得する
$results = $api->search('緑黄色社会', 'artist');
$artists_id = [];
foreach ($results->artists->items as $artist) {
    //dd($artist);
    array_push($artists_id ,substr($artist->uri,15));
    //echo $artist->name . " : " . $artist_id . PHP_EOL;
}
//echo $artists_id . PHP_EOL;

// アーティストIDを参照してアルバムIDを取得する
$albums = $api->getArtistAlbums($artists_id[0]);
foreach ($albums -> items as $album) {
    // dd($album);
    $album_id = substr($album->uri,14);
    echo $album->name . " : " . $album_id . PHP_EOL;
    
    $tracks = $api->getAlbumTracks($album_id);
    foreach ($tracks -> items as $track){
        echo $track->name . PHP_EOL;
    }
    echo PHP_EOL;
    // echo $album->name . PHP_EOL;
}

// アルバムIDを参照してトラックを取得する
$tracks = $api->getAlbumTracks($album_id);
foreach ($tracks -> items as $track){
    dd($track);
    echo $track->name . PHP_EOL;
}

// $artist = $api->getArtist('4SJ7qRgJYNXB9Yttzs4aSa');
// dd($artist);
// echo '<b>' . $artist->name . '</b>';

?>

