<?php
session_start();
require 'dbcon.php';

$user_id = $_SESSION['user_id']; 

$stmt = $pdo->prepare("SELECT firstname, lastname, dob, email FROM usersTable WHERE id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode(['success' => true, 'user' => $user]);
} else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
}
?>
