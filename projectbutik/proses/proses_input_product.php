<?php
include "connect.php";

$nama_product = (isset($_POST['nama_product'])) ? htmlentities($_POST['nama_product']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kat_product = (isset($_POST['kat_product'])) ? htmlentities($_POST['kat_product']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";


$kode_rand = rand(10000, 99999) . "_";
$target_dir = "../assets/img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imagetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_product_validate'])) {
    //cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek == false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, file yang dimasukkan telah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imagetype != "jpg" && $imagetype != "png" && $imagetype != "jpeg" && $imagetype != "gif") {
                    $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }
    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload");
                    window.location="../menu"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_daftar_product WHERE nama_product='$nama_product'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama product yang dimasukkan telah ada");
                        window.location="../menu"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_daftar_product (foto, nama_product, keterangan, kategori, harga, stok) 
    values ('" . $kode_rand . $_FILES['foto']['name'] . "', '$nama_product', '$keterangan', '$kat_product', '$harga', '$stok')");

                if ($query) {
                    $message = '<script>alert("Data berhasil dimasukkan");
                                    window.location="../menu"</script>';
                } else {
                    $message = '<script>alert("Data gagal dimasukkan");
                                window.location="../menu"</script>';
                }
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan File tidak dapat diupload");
                            window.location="../menu"</script>';
            }
        }
    }
}

echo $message;
?>