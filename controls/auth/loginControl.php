<?php
session_start();
require '../dbcon.php';

// Enable error reporting for debugging (remove in production)

error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors
ini_set('log_errors', 1); // Log errors instead
ini_set('error_log', 'php-error.log'); // Set the path for the error log


// Set the response header to JSON format
header('Content-Type: application/json');

// Get JSON input
$data = json_decode(file_get_contents("php://input"));

if (isset($data->email) && isset($data->password)) {
    $email = $data->email;
    $password = $data->password;
    $keepin = $data->keep_in;

    // Query to check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Correct password, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            if (isset($keepin)){
            session_set_cookie_params(30 * 60 * 24 * 31);
            }
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
