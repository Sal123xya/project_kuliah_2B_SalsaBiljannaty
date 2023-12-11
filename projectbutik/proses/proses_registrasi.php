<?php
include "connect.php";

// Ambil data dari formulir registrasi
$name = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : "";
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : "";
$level = isset($_POST['level']) ? htmlspecialchars($_POST['level']) : "";
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "";
$nohp = isset($_POST['nohp']) ? htmlspecialchars($_POST['nohp']) : "";
$alamat = isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : "";

// Hash password sebelum disimpan ke database
$hashedPassword = md5($password);

// Query untuk memeriksa apakah username sudah terdaftar
$checkUsernameQuery = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

// Cek apakah username sudah terdaftar
if (mysqli_num_rows($checkUsernameQuery) > 0) {
    // Jika sudah terdaftar, beri pesan kesalahan
    $message = '<script>alert("Username sudah terdaftar. Silakan gunakan username lain.");
                window.location="../registrasi"</script>';
} else {
    // Jika belum terdaftar, lakukan registrasi
    $registerQuery = mysqli_query($conn, "INSERT INTO tb_user (nama, username, level, password, nohp, alamat) 
                        VALUES ('$name', '$username', '$level', '$hashedPassword', '$nohp', '$alamat')");

    if ($registerQuery) {
        // Registrasi berhasil
        $message = '<script>alert("Registrasi berhasil. Anda sekarang dapat login.");
                    window.location="../login"</script>';
    } else {
        // Registrasi gagal
        $message = '<script>alert("Registrasi gagal. Silakan coba lagi.");
                    window.location="../registrasi"</script>';
    }
}

// Tampilkan pesan
echo $message;
?>
