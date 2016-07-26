<?php
// Start session
session_start();
// Include the files from google-php-client library in controller
include(__DIR__.'/../google-api-php-client/src/Google/autoload.php');

	if (!$redi) {
		$scriptUri = "http://".$_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];
		// $scriptUri = "http://test.cathub.org/students/";
	}

	// Store values in variables from project created in Google Developer Console
	$client_id = '628070934956-db3ugplt1u0iecgujqt2u7fd6jvoir7v.apps.googleusercontent.com';
	$client_secret = 'Hm59jHEC2TQRL7VwEIA6j4Rp';
	$redirect_uri = 'http://test.cathub.org/students/';
	$simple_api_key = 'AIzaSyCjgCYC9PbSF9RfuJdiiNAwNnsy61rs3kc';



$client = new Google_Client();
$client->setAccessType('online'); // default: offline
$client->setApplicationName('My Application name');
$client->setClientId('628070934956-db3ugplt1u0iecgujqt2u7fd6jvoir7v.apps.googleusercontent.com');
$client->setClientSecret('Hm59jHEC2TQRL7VwEIA6j4Rp');
$client->setRedirectUri($scriptUri);
$client->setDeveloperKey('AIzaSyCjgCYC9PbSF9RfuJdiiNAwNnsy61rs3kc'); // API key
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// $service implements the client interface, has to be set before auth call
$service = new Google_Service_Oauth2($client);

if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['token']);
	die('Logged out.');
}

if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // auth call to google
    $authUrl = $client->createAuthUrl();
    header("Location: ".$authUrl);
    die;
}
echo 'Hello, world.';

?>