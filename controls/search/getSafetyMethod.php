<?php
require '../dbcon.php';

$sql = "SELECT id, method_name FROM safety_methods";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$safety_methods = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($safety_methods);
?>
