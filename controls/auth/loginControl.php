<?php
session_start();
require '../dbcon.php'; // Include the connection to the database

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Allow CORS (adjust as needed for security)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get JSON input
$data = json_decode(file_get_contents("php://input"));

if (isset($data->email) && isset($data->password)) {
    $email = $data->email;
    $password = $data->password;

    // Query to check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['pword'])) {
            // Correct password, start a session
            $_SESSION['user_id'] = $user['id']; // Store the user ID in the session
            echo json_encode(['success' => true]);
        } else {
            // Incorrect password
            echo json_encode(['success' => false, 'error' => 'Invalid password']);
        }
    } else {
        // Email not found
        echo json_encode(['success' => false, 'error' => 'Email not found']);
    }
} else {
    // Missing email or password
    echo json_encode(['success' => false, 'error' => 'Email and password are required']);
}
