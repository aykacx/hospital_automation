<?php
// get_hospitals.php
include_once 'db.php';

if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];
    $stmt = $conn->prepare('SELECT * FROM hospitals WHERE city_id = :cityId');
    

    $stmt->execute([
        'cityId' => $city_id
    ]);
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // JSON olarak verileri geri döndürün
    echo json_encode($cities);
} else {
    // Şehir ID'si belirtilmediği için hata döndürüyoruz
    header("HTTP/1.1 400 Bad Request");
    echo "City ID is not provided";
}
?>
