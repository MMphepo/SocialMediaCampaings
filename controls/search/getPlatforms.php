<?php
require '../dbcon.php'; // Ensure you have a database connection file

$sql = "SELECT id, platform_name FROM platforms";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$platforms = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($platforms);
?>
