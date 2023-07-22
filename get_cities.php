<?php
include_once 'db.php';
// ...

// cities tablosundan verileri çekin
$stmt = $conn->prepare('SELECT * FROM cities');
$stmt->execute();
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON olarak verileri geri döndürün
echo json_encode($cities);
?>
