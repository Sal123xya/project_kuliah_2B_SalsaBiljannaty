<?php
include "connect.php";
$id_kat_product = (isset($_POST['id_kat_product'])) ? htmlentities($_POST['id_kat_product']) : "";

if (!empty($_POST['delete_kategori_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM tb_daftar_product WHERE kategori = '$id_kat_product'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("kategori telah digunakan pada Daftar Product. Kategori tidak dapat dihapus")
        window.location="../kategori"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_kategori_product WHERE id_kat_product ='$id_kat_product'");
        if ($query) {
            $message = '<script>alert("Data berhasil dihapus");
                    window.location="../kategori"</script>';
        } else {
            $message = '<script>alert("Data gagal dihapus");
                    window.location="../kategori" </script>';
        }
    }
}
echo $message;