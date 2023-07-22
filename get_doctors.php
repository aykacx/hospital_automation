<?php
// get_doctors.php
include "db.php";

if (isset($_GET['clinic_id']) && isset($_GET['hospital_id'])) {
    $clinic_id = $_GET['clinic_id'];
    $hospital_id = $_GET['hospital_id'];

    $stmt = $conn->prepare('SELECT * FROM doctors WHERE clinic_id=:clinicId AND hospital_id=:hospitalId');

    $stmt->execute([
        'clinicId' => $clinic_id,
        'hospitalId' => $hospital_id
    ]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Sadece gerekli bilgileri alarak yeni bir dizi oluşturuyoruz
    $allData = [];
    foreach ($data as $doctor) {
        $doctorInfo = [
            'id' => $doctor["doctor_id"],
            'name' => $doctor["doctor_name"],
            'clinic_id' => $doctor["clinic_id"],
            'hospital_id' => $doctor["hospital_id"]
        ];
        $allData[] = $doctorInfo;
    }

    // JSON olarak çıktı döndürüyoruz
    header('Content-Type: application/json');
    echo json_encode($allData);
} else {
    // Klinik ID'si veya hastane ID'si belirtilmediği için hata döndürüyoruz
    header("HTTP/1.1 400 Bad Request");
    echo "Clinic ID and Hospital ID are not provided";
}
?>
