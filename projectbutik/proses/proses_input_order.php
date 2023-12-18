<?php 
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if(!empty($_POST['input_order_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order' ");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("order yang dimasukan telah ada")
                    window.location="../order"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_order (id_order,alamat,pelanggan) values ('$kode_order','$alamat','$pelanggan')");
        if($query){
            $message ='<script>alert("Data berhasil dimasukkan")
            window.location="../order"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan")</script>';
        }
    }

}echo $message;
?>