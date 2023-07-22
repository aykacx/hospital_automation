<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<?php include_once 'db.php';
session_start();



if (isset($_POST['signup'])) {
    $f_name = isset($_POST['f_name']) ? $_POST['f_name'] : null;
    $l_name = isset($_POST['l_name']) ? $_POST['l_name'] : null;
    $id_number = isset($_POST['id_number']) ? $_POST['id_number'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $sql = 'INSERT INTO users (first_name, last_name, identity_number, password) 
    VALUES (?, ?, ?, ?)';

    $insert = $conn->prepare($sql);
    $insert->execute(
        [$f_name, $l_name, $id_number, $password]
    );
    if ($insert) {
        header('location:index.php');
    } else {
        die('conn bug:' . $insert->errorInfo());
    }
}


if (isset($_POST['login'])) {
    $id_num = isset($_POST['id_num']) ? $_POST['id_num'] : null;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

    $sql = "SELECT * FROM users WHERE identity_number=:id_num AND password=:pass";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_num' => $id_num,
        ':pass' => $pass
    ]);

    $rowCount = $stmt->rowCount();

    if ($rowCount == 1) {
        $_SESSION['identity_number'] = $id_num;
        header('location:home_page.php?success');
    } else {
        header('location:index.php');
        exit;
    }
}

if (isset($_POST['apply_appo'])) {
    $date = $_POST['date'];
    $city = $_POST['city'];
    $hospital = $_POST['hospital'];
    $clinic = $_POST['clinic'];
    $doctor = $_POST['doctor'];
    $user_id = $_POST['user_id'];

    $sql = 'INSERT INTO appointments (date, city, hospital, clinic, doctor, user_id) 
    VALUES (?, ?, ?, ?, ?, ?)';
    $pushAppo = $conn->prepare($sql);
    $pushAppo->execute([
        $date,
        $city,
        $hospital,
        $clinic,
        $doctor,
        $user_id
    ]);

    if ($pushAppo) {
        header('location: appointment_information.php');
    } else {
        echo 'error: ' . $pushAppo->errorInfo() . 'error code: ' . $pushAppo->errorCode();
    }
}
?>

<body>
    <script>
        $(document).ready(function () {
            // cities selecti değiştiğinde çalışacak fonksiyon
            $('.city').change(function () {
                var selectedCity = $(this).val();
                var hospitalSelect = $('.hospital');

                // AJAX isteği göndererek hastaneleri getir
                $.ajax({
                    url: 'get_hospitals.php',
                    method: 'POST',
                    data: { city: selectedCity },
                    dataType: 'json',
                    success: function (response) {
                        hospitalSelect.empty();
                        hospitalSelect.append('<option value="" disabled selected>Choose hospital</option>');
                        $.each(response, function (index, hospital) {
                            hospitalSelect.append('<option value="' + hospital.hospital_id + '">' + hospital.hospital_name + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            // hospitals selecti değiştiğinde çalışacak fonksiyon
            $('.hospital').change(function () {
                var selectedHospital = $(this).val();
                var clinicSelect = $('.clinic');

                // AJAX isteği göndererek klinikleri getir
                $.ajax({
                    url: 'get_clinics.php',
                    method: 'POST',
                    data: { hospital: selectedHospital },
                    dataType: 'json',
                    success: function (response) {
                        clinicSelect.empty();
                        clinicSelect.append('<option value="" disabled selected>Choose clinic</option>');
                        $.each(response, function (index, clinic) {
                            clinicSelect.append('<option value="' + clinic.clinic_id + '">' + clinic.clinic_name + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>


<?php

if (isset($_POST['update'])) {
    $newFName = $_POST['f_name'];
    $newLName = $_POST['l_name'];
    $newIdNumber = $_POST['id_number'];
    $newPass = $_POST['password'];

    $user_id_num = $_SESSION['identity_number'];


    $sql = 'UPDATE users SET first_name=?, last_name=?, identity_number=?, password=? WHERE identity_number = ?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $newFName,
        $newLName,
        $newIdNumber,
        $newPass,
        $$user_id_num
    ]);

    if ($stmt) {
        header('location:account_information.php');
    } else {
        header('location:account_information.php');
    }
}


if (isset($_POST['logout'])) {
    header('location:index.php');
    session_destroy();
    $conn = " ";
}





?>