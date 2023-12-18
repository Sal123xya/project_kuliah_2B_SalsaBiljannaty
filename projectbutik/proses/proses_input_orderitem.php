<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$product = (isset($_POST['product'])) ? htmlentities($_POST['product']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['input_orderitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE product = '$product' && kode_order='$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("item yang dimasukan telah ada")
        window.location="../?x=orderitem&order=' . $kode_order . '&alamat=' . $alamat . '&pelanggan=' . $pelanggan . '"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_list_order (product, kode_order, jumlah) VALUES ('$product', '$kode_order', '$jumlah')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../?x=orderitem&order=' . $kode_order . '&alamat=' . $alamat . '&pelanggan=' . $pelanggan . '"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../?x=orderitem&order=' . $kode_order . '&alamat=' . $alamat . '&pelanggan=' . $pelanggan . '"</script>';
        }
    }
}

echo $message;
?>