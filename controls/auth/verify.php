<?php
require_once '../../vendor/autoload.php'; // Path to Google API Client Library

$client = new Google_Client(['client_id' => 'YOUR_GOOGLE_CLIENT_ID']);
$credential = $_POST['credential'];

try {
    $payload = $client->verifyIdToken($credential);
    if ($payload) {
        $userid = $payload['sub']; // Google User ID
        $email = $payload['email'];
        $name = $payload['name'];

        // Handle login or account creation here
        // e.g., start a session, save user info to the database
        session_start();
        $_SESSION['user_id'] = $userid;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        echo 'User verified: ' . $email;
    } else {
        // Invalid ID token
        echo 'Invalid token';
    }
} catch (Exception $e) {
    // Error occurred during token verification
    echo 'Error: ' . $e->getMessage();
}
