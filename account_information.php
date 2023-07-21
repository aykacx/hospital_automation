<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Account</title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include_once 'home_header.php'; ?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="transactions.php" method="POST">
                    <div class="form-group">
                        <label for="f_name">First name</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $user_f_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last name</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo $user_l_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_number">Identity Number</label>
                        <input type="text" class="form-control" id="id_number" name="id_number" value="<?php echo $user_id_num; ?>" pattern="\d{11}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $user_password; ?>" pattern=".{8,}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
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