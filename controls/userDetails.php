<?php
session_start();
require 'dbcon.php';

$user_id = $_SESSION['user_id']; // Assuming the user is logged in and the user ID is stored in the session

$stmt = $pdo->prepare("SELECT firstname, lastname, dob, email FROM usersTable WHERE id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode(['success' => true, 'user' => $user]);
} else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
}
?>
