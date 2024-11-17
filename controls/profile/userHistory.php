<?php
session_start();
require '../dbcon.php';

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT id, title, url, timestamp FROM browsing_history WHERE user_id = :user_id ORDER BY timestamp DESC");
$stmt->execute(['user_id' => $user_id]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'history' => $history]);
?>
