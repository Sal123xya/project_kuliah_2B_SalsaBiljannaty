<?php 
include "connect.php";
$jenisproduct = (isset($_POST['jenisproduct'])) ? htmlentities($_POST['jenisproduct']) : "";
$katproduct = (isset($_POST['katproduct'])) ? htmlentities($_POST['katproduct']) : "";


if(!empty($_POST['input_kategori_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_product FROM tb_kategori_product WHERE kategori_product = '$katproduct'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("kategori yang dimasukan telah ada")
        window.location="../kategori"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_kategori_product(jenis_product,kategori_product)values('$jenisproduct','$katproduct')");
        if($query){
            $message = '<script>alert("Data berhasil dimasukkan")
            window.location="../kategori"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../kategori"</script>';
        }
    }

}echo $message;
