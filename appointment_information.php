<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Appointment</title>
</head>

<body>
    <?php include_once 'home_header.php'; ?>
    <div class="container text-center">
        <h4 class="mt-3">Appointments</h4>
        <table class="table table-bordered mt-2 ml-5 bg-light text-center col-md-10">
            <thead>
                <tr>
                    <th scope="col">City</th>
                    <th scope="col">Date</th>
                    <th scope="col">Hospital</th>
                    <th scope="col">Clinic</th>
                    <th scope="col">Doctor</th>
                </tr>
            </thead>
            <?php
            $user_id_num = $_SESSION['identity_number'];

            $sql = 'SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.id WHERE identity_number = :user_identity';

            $pullAppo = $conn->prepare($sql);
            $pullAppo->execute(['user_identity' => $user_id_num]);
            

            while ($fetchAppo = $pullAppo->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $fetchAppo['city']; ?>
                        </td>
                        <td>
                            <?php echo $fetchAppo['date']; ?>
                        </td>
                        <td>
                            <?php echo $fetchAppo['hospital']; ?>
                        </td>
                        <td>
                            <?php echo $fetchAppo['clinic']; ?>
                        </td>
                        <td>
                            <?php echo $fetchAppo['doctor']; ?>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>