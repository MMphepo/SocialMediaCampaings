<?php

session_start();

if ($_GET['action'] == 'checkLoginStatus') {
    if (isset($_SESSION['user_id'])) {
        echo json_encode(['loggedIn' => true]);
    } else {
        echo json_encode(['loggedIn' => false]);
    }
}
?>
