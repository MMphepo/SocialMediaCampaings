<?php
ini_set('log_errors', 1); // Log errors instead
ini_set('error_log', 'php-error.log');
session_start();
require '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"));
    $entry_id = $data->id;

    // Delete the history entry from the database
    $stmt = $pdo->prepare("DELETE FROM browsing_history WHERE id = :entry_id AND user_id = :user_id");
    $stmt->execute(['entry_id' => $entry_id, 'user_id' => $_SESSION['user_id']]);

    // Check if any rows were affected
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'History entry deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete history entry']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
