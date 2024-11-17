<?php

require 'dbcon.php'; 
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php-error.log');

header('Content-Type: application/json');

// Read JSON input from POST request
$data = json_decode(file_get_contents("php://input"));

if (isset($data->email)) {
    $email = $data->email;

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if the email already exists in the database
        $stmt = $pdo->prepare("SELECT * FROM newsletter WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $existingEmail = $stmt->fetch();

        if (!$existingEmail) {
            // Insert the email into the newsletter table
            $stmt = $pdo->prepare("INSERT INTO newsletter (email, subscribed_at) VALUES (:email, NOW())");
            if ($stmt->execute(['email' => $email])) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to subscribe.']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Email is already subscribed.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid email format.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Email is required.']);
}
