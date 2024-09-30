<?php
require '../dbcon.php'; // Include the connection to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the email and hashed password into the database
    $stmt = $pdo->prepare("INSERT INTO users (email, pword) VALUES (:email, :password)");
    $stmt->execute(['email' => $email, 'password' => $hashed_password]);

    header("Location: ../../Pages/auth/login.php");
    exit();
}
?>
