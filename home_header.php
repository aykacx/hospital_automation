<?php
include_once 'db.php';
ob_start();
session_start();

$sql = 'SELECT * FROM users WHERE identity_number=:user_identity';

$stmt = $conn->prepare($sql);
$stmt->execute(['user_identity' => $_SESSION['identity_number']]);
$stmtRowCount = $stmt->rowCount();

if ($stmtRowCount == 0) {
    header('location:index.php');
    exit(); 
}

$fetchUser = $stmt->fetch(PDO::FETCH_ASSOC);

$user_id = $fetchUser['id'];
$user_f_name = $fetchUser['first_name'];
$user_l_name = $fetchUser['last_name'];
$user_id_num = $fetchUser['identity_number'];
$user_password = $fetchUser['password'];
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home_page.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="account_information.php">Account Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="appointment_information.php">Appointment Information</a>
            </li>
        </ul>
        <form action="transactions.php" method="POST" class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-danger my-2 my-sm-0" name="logout" type="submit">Log out</button>
        </form>
    </div>
</nav>