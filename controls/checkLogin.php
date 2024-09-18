<?php
// api.php
session_start();

if ($_GET['action'] == 'checkLoginStatus') {
    if (isset($_SESSION['user_id'])) {
        // User is logged in
        echo json_encode(['loggedIn' => true]);
    } else {
        // User is not logged in
        echo json_encode(['loggedIn' => false]);
    }
}
?>
