<?php 
session_start();
include "connect.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if(!empty($_POST['selesai_orderitem_validate'])){
        $query = mysqli_query($conn, "UPDATE tb_list_order SET status=2 WHERE id_list_order = '$id'");
        if($query){
            $message = '<script>alert("Orderan telah selesai");
            window.location="../transaksi"</script>';
        }else{
            $message = '<script>alert("Orderan gagal dibuat");
            window.location="../transaksi"</script>';
        }
    }

echo $message;