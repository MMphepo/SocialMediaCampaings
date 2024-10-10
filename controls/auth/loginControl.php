<?php
session_start();
require '../dbcon.php';

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1); 
ini_set('error_log', 'php-error.log');


header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));

if (isset($data->email) && isset($data->password)) {
    $email = $data->email;
    $password = $data->password;
    $keepin = $data->keep_in;

    // Check if the user is locked out
    if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
        $remaining_time = $_SESSION['lockout_time'] - time();
        echo json_encode(['success' => false, 'error' => 'Account locked. Try again in ' . ceil($remaining_time / 60) . ' minutes.']);
        exit();
    } else {

        // Query to check if the email exists in the database
        $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Correct password, reset attempts and lockout session
                $_SESSION['failed_attempts'] = 0;
                unset($_SESSION['lockout_time']);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];

                if (isset($keepin)) {
                    session_set_cookie_params(30 * 60 * 24 * 31);
                }

                echo json_encode(['success' => true]);
            } else {
                if (!isset($_SESSION['failed_attempts'])) {
                    $_SESSION['failed_attempts'] = 0;
                }

                $_SESSION['failed_attempts']++;

                if ($_SESSION['failed_attempts'] >= 3) {
                    $_SESSION['lockout_time'] = time() + (10 * 60);
                    echo json_encode(['success' => false, 'error' => 'Too many failed attempts. Account locked for 10 minutes.']);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Invalid password. ' . (3 - $_SESSION['failed_attempts']) . ' attempts remaining.']);
                }
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Email not found']);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Email and password are required']);
}
