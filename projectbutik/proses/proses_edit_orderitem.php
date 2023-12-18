<?php
session_start();
include "connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$product = (isset($_POST['product'])) ? htmlentities($_POST['product']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$kode = (isset($_POST['kode'])) ? htmlentities($_POST['kode']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['edit_orderitem_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_list_order SET product='$product', jumlah='$jumlah' WHERE id_list_order='$id'");

        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../?x=orderitem&order=' . $kode . '&alamat=' . $alamat . '&pelanggan=' . $pelanggan . '"</script>';
        
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../?x=orderitem&order=' . $product . '&pelanggan=' . $pelanggan . '"</script>';
        }
    }

echo $message;
?>