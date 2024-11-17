<?php
session_start();
require '../dbcon.php';

$user_id = $_SESSION['user_id']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    // Update the user's details in the database
    try {
        $stmt = $pdo->prepare("UPDATE usersTable SET firstname = :firstname, lastname = :lastname, dob = :dob, email = :email WHERE id = :user_id");
        $stmt->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'dob' => $dob,
            'email' => $email,
            'user_id' => $user_id
        ]);

        echo json_encode(['success' => true, 'message' => 'Account updated successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Update failed: ' . $e->getMessage()]);
    }
}
?>
