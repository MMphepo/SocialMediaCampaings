<?php
require '../dbcon.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the response header to JSON format
    header('Content-Type: application/json');

    // Get POST data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usersTable WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // Return error response if email already exists
        echo json_encode(['success' => false,'message' => 'Email already exists']);
        exit();
    }else {

    try {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the data into the database
        $stmt = $pdo->prepare("INSERT INTO `usersTable` (firstname, lastname, dob, email, password) VALUES (:firstname, :lastname, :dob, :email, :password)");
        $stmt->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'dob' => $dob,
            'email' => $email,
            'password' => $hashed_password
        ]);

        // Return success response
        echo json_encode(['success' => true, 'message' => 'Registration successful']);
    } catch (Exception $e) {
        // Return error response in case of failure
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
    exit();
}
}
?>

