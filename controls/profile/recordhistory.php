<?php
ini_set('log_errors', 1); // Log errors instead
ini_set('error_log', 'php-error.log');
session_start();
require 'dbcon.php'; 


$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['title']) && isset($data['url'])) {
    $user_id = $_SESSION['user_id'];  
    $title = $data['title'];
    $url = $data['url'];

    //  query to insert both title and URL
    $stmt = $pdo->prepare("INSERT INTO browsing_history (user_id, url, title, timestamp) VALUES (:user_id, :url, :title, NOW())");
    $stmt->execute([
        'user_id' => $user_id,
        'url' => $url,
        'title' => $title
    ]);

    echo json_encode(['success' => true, 'message' => 'Browsing history stored']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
