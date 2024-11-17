<?php
ini_set('log_errors', 1); 
ini_set('error_log', 'php-error.log');
require '../dbcon.php';

$search = $_GET['search'] ?? '';
$platform = $_GET['platform'] ?? '';
$method = $_GET['method'] ?? '';


$sql = "SELECT title, description 
        FROM safety_tips 
        WHERE 1=1 
        AND (title LIKE :search OR description LIKE :search)";

if (!empty($platform)) {
    $sql .= " AND platform_id = :platform";
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);

if (!empty($platform)) {
    $stmt->bindValue(':platform', $platform, PDO::PARAM_INT);
}

$stmt->execute();


print_r($stmt);
$stmt->execute();

$safety_tips = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($safety_tips);
?>
