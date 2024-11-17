<?php
ini_set('display_errors', 0); 
ini_set('log_errors', 1); // Log errors
ini_set('error_log', 'php-error.log'); 
session_start();
require_once '../../vendor/autoload.php'; // Path to Google API Client Library
require '../dbcon.php';

$client = new Google_Client(['client_id' => '601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com']);

if (isset($_POST['credential'])) {
    $credential = $_POST['credential'];
} else {
    die("Credential not provided");
}

try {
    $payload = $client->verifyIdToken($credential);
    if ($payload) {
        $guserid = $payload['sub']; // Google User ID
        $email = $payload['email'];
        $name = $payload['name'];

        // Handle names with missing parts
        $nameParts = explode(' ', $name);
        $firstname = $nameParts[0];
        $lastname = isset($nameParts[1]) ? $nameParts[1] : '';
        $dob = '2024-10-22';
        $dpassword = '1212';
        $hashed_password = password_hash($dpassword, PASSWORD_DEFAULT);
        // Check if user already exists
        $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();


        if ($user) {
            // User found, set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
        } else {
            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO usersTable (email, firstname, dob, lastname, password) VALUES (:email, :firstname, :dob, :lastname, :password)");
            $stmt->execute(['email' => $email, 'firstname' => $firstname, 'dob'=> $dob, 'lastname' => $lastname, 'password' => $hashed_password]);
            $userid = $pdo->lastInsertId();

            // Set session with newly inserted data
            $_SESSION['user_id'] = $userid;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
        }

        // Output user verification status
        echo 'User verified: ' . $firstname . ' ' . $lastname . '<br>';
        echo 'Email: ' . $email . '<br>';
    } else {
        // Invalid ID token
        echo 'Invalid token';
    }
} catch (Exception $e) {
    // Log and display error
    error_log('Error: ' . $e->getMessage());
    echo 'Error occurred: ' . $e->getMessage();
}
