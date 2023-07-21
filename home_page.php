<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Home Page</title>
</head>

<body>
    <?php include_once 'home_header.php'; ?>

    <div class="fnln ml-5 mt-3">
        <b>Welcome
            <?php echo $user_f_name . " " . $user_l_name; ?>
        </b>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 bg-light min-vh-100 ml-5 mb-5 mr-2 p-6 border rounded">
                <form action="transactions.php" method="POST">
                    <div class="form-group">
                        <label for="date">Choose a date:</label>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class="form-group">
                        <?php include_once 'cities.php'; ?>
                    </div>

                    <div class="form-group">
                        <label for="hospital">Choose a hospital:</label>
                        <select class="form-control hospital" name="hospital">
                            <option value="hospital" disabled selected>Choose hospital</option>
                            <option value="Liberty City Hospital">Liberty City Hospital</option>
                            <option value="San Andreas Hospital">San Andreas Hospital</option>
                            <option value="Vice City Hospital">Vice City Hospital</option>
                            <option value="Los Santos Hospital">Los Santos Hospital</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="clinic">Choose a clinic:</label>
                        <select class="form-control clinic" name="clinic">
                            <option value="clinic" disabled selected>Choose clinic</option>
                            <option value="First Aid">First Aid</option>
                            <option value="I Got Shot! Heeeealp!">I Got Shot! Heeeealp!</option>
                            <option value="Vehicle Explosive Death Healing">Vehicle Explosive Death Healing</option>
                            <option value="Death Because Of  Life Bug">Death Because Of Life Bug</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor">Choose a doctor:</label>
                        <select class="form-control doctor" name="doctor">
                            <option value="doctor" disabled selected>Choose doctor</option>
                            <option value="Prof. Dr. Carl Johnson">Prof. Dr. Carl Johnson</option>
                            <option value="Dr. Micheal De Santa">Dr. Micheal De Santa</option>
                            <option value="Dr. Tommy Vercetty">Dr. Tommy Vercetty</option>
                            <option value="Dr. Franklin Clinton">Dr. Franklin Clinton</option>
                            <option value="Dr. Trevor Philips">Dr. Trevor Philips</option>
                        </select>
                    </div>

                    <input hidden value="<?php echo $user_id; ?>" name="user_id">

                    <button name="apply_appo" type="submit" class="btn btn-primary">Save the appointment</button>
                </form>
            </div>
            <div class="col-md-5 bg-light min-vh-100 ml-4 mb-5 p-6 border rounded">
                <p>There is no family doc</p>
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