<?php
require 'dbcon.php'; 

// Receive the search parameters (platform, method, or latest)
$platform_id = isset($_GET['platform_id']) ? $_GET['platform_id'] : null;
$method_id = isset($_GET['method_id']) ? $_GET['method_id'] : null;
$latest = isset($_GET['latest']) ? $_GET['latest'] : false;

$query = "SELECT safety_tips.title, safety_tips.description, platforms.platform_name, safety_methods.method_name, safety_tips.date_added 
          FROM safety_tips 
          INNER JOIN platforms ON safety_tips.platform_id = platforms.id
          INNER JOIN safety_methods ON safety_tips.method_id = safety_methods.id WHERE 1=1";

// Search by platform
if ($platform_id) {
    $query .= " AND platform_id = :platform_id";
}
// Search by safety method
if ($method_id) {
    $query .= " AND method_id = :method_id";
}
// Sort by latest
if ($latest) {
    $query .= " ORDER BY date_added DESC";
}

$stmt = $pdo->prepare($query);

// Bind values based on the filters used
if ($platform_id) $stmt->bindValue(':platform_id', $platform_id, PDO::PARAM_INT);
if ($method_id) $stmt->bindValue(':method_id', $method_id, PDO::PARAM_INT);

$stmt->execute();
$safety_tips = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return as JSON for the frontend
echo json_encode($safety_tips);
?>
