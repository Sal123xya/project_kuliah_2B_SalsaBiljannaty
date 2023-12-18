<?php 
include "connect.php";
$id_kat_product = (isset($_POST['id_kat_product'])) ? htmlentities($_POST['id_kat_product']) : "";
$jenisproduct = (isset($_POST['jenisproduct'])) ? htmlentities($_POST['jenisproduct']) : "";
$katproduct = (isset($_POST['katproduct'])) ? htmlentities($_POST['katproduct']) : "";

if(!empty($_POST['edit_kategori_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_product FROM tb_kategori_product WHERE kategori_product = '$katproduct'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("Kategori Product yang dimasukan telah ada");
        window.location="../kategori"</script>';
    }else{
        $query = mysqli_query($conn, "UPDATE tb_kategori_product SET jenis_product='$jenisproduct', kategori_product='$katproduct' WHERE id_kat_product='$id_kat_product'");
        if($query){
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../kategori"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../kategori"</script>';
        }
    }

}echo $message;
?>