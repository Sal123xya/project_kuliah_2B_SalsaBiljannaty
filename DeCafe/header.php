<?php 
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username_decafe]'");
$records = mysqli_fetch_array($query);
?>

<body style="height: 3000px;">
    <nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="."><i class="bi bi-cup-hot"></i>DeCafe</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $hasil['username']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#ModalUbahProfile"><i class="bi bi-person-fill">
                                    </i> Profile</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#ModalUbahPassword">
                                    <i class="bi bi-key"></i> Ubah Password</a></li>
                            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left">
                                    </i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal ubah password-->
    <div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input disabled type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="username" required
                                        value="<?php echo $_SESSION['username_decafe'] ?>">
                                    <label for="floatingInput">Username</label>
                                    <div class="invalid-feedback">
                                        Masukkan Username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingnama"
                                        name="nama" required>
                                    <label for="floatingnama">Password Lama</label>
                                    <div class="invalid-feedback">
                                        Masukkan Password Lama.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPasswordBaru"
                                        name="passwordbaru" required>
                                    <label for="floatingPasswordBaru">Password Baru</label>
                                    <div class="invalid-feedback">
                                        Masukkan Password Baru.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingRePasswordBaru"
                                        name="repasswordbaru" required>
                                    <label for="floatingRePasswordBaru">Ulangi Password Baru</label>
                                    <div class="invalid-feedback">
                                        Masukkan Ulangi Password Baru.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ubah_password_validate"
                                value="1234">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal ubah password-->

    <!-- Modal ubah profile-->
    <div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_ubah_profile.php" method="POST">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input disabled type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="username" required
                                        value="<?php echo $_SESSION['username_decafe'] ?>">
                                    <label for="floatingInput">Username</label>
                                    <div class="invalid-feedback">
                                        Masukkan Username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingNama"
                                        name="Nama" required value="<?php echo $records['Nama'] ?>">
                                    <label for="floatingNama">Nama</label>
                                    <div class="invalid-feedback">
                                        Masukkan Nama Anda.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="Nohp" required value="<?php echo $records['Nohp'] ?>">
                                    <label for="floatingInput">Nomor Hp</label>
                                    <div class="invalid-feedback">
                                        Masukkan Nomor Hp.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                <textarea class="form-control" id="" style="height: 100px"
                                            name="Alamat"><?php echo $records['Alamat'] ?></textarea>
                                    <label for="floatingInput">Alamat</label>
                                    <div class="invalid-feedback">
                                        Masukkan Alamat Anda.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ubah_profile_validate"
                                value="1234">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal ubah password-->