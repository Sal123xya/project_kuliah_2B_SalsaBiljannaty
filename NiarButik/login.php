<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="assets/css/login.css" rel="stylesheet">
    <title>Niar Butik - Aplikasi pemesanan baju</title>
</head>

<body>
    <div class="container-fluid">
        <form class="mx-auto needs-validation" novalidate action="proses/proses_login.php" method="post">
            <h4 class="text-center">Login</h4>
            <div class="mb-3 mt-5">
                <label for="exampleInputEmail1" class="form-label"> Username</label>
                <input name="username" type="email" class="form-control" id="floatinginput" aria-describedby="emailHelp" Required>
                <div class="invalid-feedback">
                    Masukkan Password.
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Password</label>
                <input name="password" type="password" class="form-control" id="floatingpassword" Required>
                <div class="invalid-feedback">
                    Masukkan Password.
                </div>
                <div class="checkbox mb-3 mt-2">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember Me
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4" name="submit_validate" value="abc">Login</button>
        </form>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
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