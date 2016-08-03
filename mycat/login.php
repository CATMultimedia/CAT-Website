<?php

session_start();

if( !isset($_GET['code']) or isset($_SESSION["gp_access_token"]) or isset($_SESSION["gp_result"]) ){
    header("location: /mycat/staff");
    exit();
}

include 'login.func.php';
include 'config.php';

$header = array( "Content-Type: application/x-www-form-urlencoded" );

$data = http_build_query(
        array(
            'code' => str_replace("#", null, $_GET['code']),
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'hd' => 'cat.mx',
            'grant_type' => 'authorization_code'
        )
    );

$url = "https://www.googleapis.com/oauth2/v4/token";

$result = MyCAT_HTTP(1, $url, $header, $data);

if( !empty($result['error']) ){ // If error login
    header("location: /mycat/error");
    exit();
}else{
    $_SESSION["gp_access_token"] = $result['access_token']; // Access Token
    header("location: /mycat/staff");
}

?>