<?php
session_start();
if (!empty($_SESSION['username_projectbutik'])) {
    header('location:home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #FFE4B5;
        }

        .form-signup {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgb(173, 216, 230);
        }

        .form-signup input:focus {
            border-color: #FFE4B5 !important;
            box-shadow: 0 0 0 0.25rem rgb(173, 216, 230) !important;
        }

        .form-signup h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-signup label {
            font-weight: 600;
        }

        .form-signup button {
            background-color: #FFE4B5;
            border-color: #FFE4B5;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #FFE4B5 !important;
        }

        .btn-login:active,
        .btn-login:focus {
            background-color: #FFE4B5 !important;
            border-color: #FFE4B5 !important;
            color: #FFE4B5 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="form-signup" action="proses/proses_registrasi.php" method="POST">
                <h2 class="mb-3 modal-title fs-5" id="exampleModalLabel">Registrasi</h2>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="level" class="form-control" id="level" name="level" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nohp</label>
                    <input type="nohp" class="form-control" id="nohp" name="nohp" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat" required>
                </div>
                <button type="submit" class="btn btn-login" style="font-family: 'Comis sans ms';">Register</button>
        </form>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>