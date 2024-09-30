<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../../vendor/autoload.php'; // Path to Google API Client Library

$client = new Google_Client(['client_id' => '601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com']);
$credential = $_POST['credential'];

try {
    $payload = $client->verifyIdToken($credential);
    if ($payload) {
        $userid = $payload['sub']; // Google User ID
        $email = $payload['email'];
        $name = $payload['name'];

        // Handle login or account creation here
        // e.g., start a session, save user info to the database

        $_SESSION['user_id'] = $userid;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        echo 'User verified: ' . $name;
        echo $email;

    } else {
        // Invalid ID token
        echo 'Invalid token';
    }
} catch (Exception $e) {
    // Error occurred during token verification
    echo 'Error: ' . $e->getMessage();
}
