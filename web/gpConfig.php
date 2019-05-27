<?php
session_start();

include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

$clientId = '528214689530-78o2360hglpbvemrjf7vn29aruvpck2p.apps.googleusercontent.com'; 
$clientSecret = '2YZU7z_q_tuKQo4xq8tMKdkJ'; 
$redirectURL = 'http://educacioninclusiva.tezio.com.co/login/web/'; 

$gClient = new Google_Client();
$gClient->setApplicationName('educacioninclusiva.tezio.com.co');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>