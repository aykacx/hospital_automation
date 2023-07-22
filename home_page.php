<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <label for="city">Choose a city:</label>
                        <select class="form-control city" name="city" id="citySelect">
                            <!-- Cities seçenekleri burada olacak -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hospital">Choose a hospital:</label>
                        <select class="form-control hospital" name="hospital" id="hospitalSelect">
                            <option value="" disabled selected>Choose hospital</option>
                            <!-- Hospitals seçenekleri burada olacak -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="clinic">Choose a clinic:</label>
                        <select class="form-control clinic" name="clinic" id="clinicSelect">
                            <option value="" disabled selected>Choose clinic</option>
                            <!-- Clinics seçenekleri burada olacak -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor">Choose a doctor:</label>
                        <select class="form-control doctor" name="doctor" id="doctorSelect">
                            <option value="" disabled selected>Choose doctor</option>
                            <!-- Doctors seçenekleri burada olacak -->
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

    <script>
        // AJAX ile cities verilerini çekmek için
        fetch('get_cities.php')
            .then(response => response.json())
            .then(data => {
                const citySelect = document.getElementById('citySelect');
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.city_id;
                    option.text = city.city_name;
                    citySelect.appendChild(option);
                });
            });

        // hospitals select'ini güncellemek için
        document.getElementById('citySelect').addEventListener('change', function () {
            const selectedCityId = this.value;
            const hospitalSelect = document.getElementById('hospitalSelect');
            hospitalSelect.innerHTML = '<option value="" disabled selected>Choose hospital</option>';
            const clinicSelect = document.getElementById('clinicSelect');
            clinicSelect.innerHTML = '<option value="" disabled selected>Choose clinic</option>';

            fetch('get_hospitals.php?city_id=' + selectedCityId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(hospital => {
                        const option = document.createElement('option');
                        option.value = hospital.hospital_id;
                        option.text = hospital.hospital_name;
                        hospitalSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching hospitals:', error));
        });

        // clinics select'ini güncellemek için
        document.getElementById('hospitalSelect').addEventListener('change', function () {
            const selectedHospitalId = this.value;
            const clinicSelect = document.getElementById('clinicSelect');
            clinicSelect.innerHTML = '<option value="" disabled selected>Choose clinic</option>';

            fetch(`get_clinics.php?hospital_id=${selectedHospitalId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(clinic => {
                        const option = document.createElement('option');
                        option.value = clinic.clinic_id;
                        option.text = clinic.clinic_name;
                        clinicSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching clinics:', error));
        });

        // doctors select'ini güncellemek için
        document.getElementById('clinicSelect').addEventListener('change', function () {
            const selectedHospitalId = document.getElementById('hospitalSelect').value;
            const selectedClinicId = this.value;
            const doctorSelect = document.getElementById('doctorSelect');
            doctorSelect.innerHTML = '<option value="" disabled selected>Choose doctor</option>';

            if (selectedHospitalId && selectedClinicId) {
                fetch(`get_doctors.php?hospital_id=${selectedHospitalId}&clinic_id=${selectedClinicId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(doctor => {
                            const option = document.createElement('option');
                            option.value = doctor.id;
                            option.text = doctor.name;
                            doctorSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching doctors:', error));
            } else {
                // Eğer hastane veya klinik seçilmemişse, doktorları getirmeyi atla
                console.log('Select a hospital and a clinic first.');
            }
        });
    </script>


</body>

</html>