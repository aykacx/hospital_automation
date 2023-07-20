<?php include_once 'db.php';



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
    $id_num = isset($_POST['id_num'])?$_POST['id_num']:null;
    $pass = isset($_POST['pass'])?$_POST['pass']:null;

    $sql = "SELECT * FROM users WHERE identity_number=:id_num AND password=:pass";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_num'=>$id_num, ':pass'=>$pass
    ]);

    $rowCount = $stmt->rowCount();

    if ($rowCount == 1) {
        $_SESSION['userIdentity'] = $id_num;
        header('location:home_page.php?success');
    }else {
        header('location:index.php');
        exit;
    }
}






?>