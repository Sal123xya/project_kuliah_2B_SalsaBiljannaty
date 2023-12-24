<?php
session_start();
include "connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$catatan= (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['terima_orderitem_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_list_order SET status=1 WHERE id_list_order='$id'");

        if ($query) {
            $message = '<script>alert("Berhasil terima order");
            window.location="../transaksi"</script>';
        } else {
            $message = '<script>alert("Gagal terima order");
            window.location="../transaksi"</script>';
        }
    }

echo $message;
?>