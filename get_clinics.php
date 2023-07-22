<?php
include_once 'db.php';
// ...

// clinics tablosundan verileri çekin
$stmt = $conn->prepare('SELECT * FROM clinics');
$stmt->execute();
$clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON olarak verileri geri döndürün
echo json_encode($clinics);
?>