<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.id_order, tb_order.pelanggan, tb_order.alamat,  tb_order.waktu_order, tb_bayar.id_bayar, SUM(tb_daftar_product.harga * tb_list_order.jumlah) AS total_harga
    FROM tb_order
    LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
    LEFT JOIN tb_daftar_product ON tb_daftar_product.id = tb_list_order.product
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
    GROUP BY tb_order.id_order
    ORDER BY tb_order.waktu_order DESC");



while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"
                        style="background-color: #FFE4C4;">
                        Tambah Order</button>
                </div>
            </div>

            <!-- Modal Tambah Order baru -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Orderan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" action="proses/proses_input_order.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto" name="kode_order"
                                                value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                            <label for="uploadFoto">Kode order</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kode orderan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan"
                                                placeholder="Nama Pelanggan" name="pelanggan" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="alamat" placeholder="alamat"
                                                name="alamat" required>
                                            <label for="alamat">Alamat</label>
                                            <div class="invalid-feedback">
                                                Masukkan Alamat.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn" name="input_order_validate" value="12345"
                                style="background-color: #FFE4C4;">Buat
                                pesanan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir modal tambah Order baru -->


        <?php
        if (empty($result)) {
            echo " Data menu Keripik Tidak Ada ";
        } else {
            foreach ($result as $row) {
                ?>


                <!-- Modal edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" action="proses/proses_edit_order.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input readonly type="text" class="form-control" id="uploadFoto"
                                                    name="kode_order" value="<?php echo $row['id_order'] ?>">
                                                <label for="uploadFoto">Kode Order</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Order.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan"
                                                    placeholder="Nama Pelanggan" name="pelanggan" required required
                                                    value="<?php echo $row['pelanggan'] ?>">
                                                <label for="pelanggan">Nama Pelanggan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pelanggan.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 ">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="alamat" placeholder="alamat"
                                                    name="alamat" required required value="<?php echo $row['alamat'] ?>">
                                                <label for="pelanggan">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn " name="edit_order_validate"
                                    value="12345" style="background-color: #FFE4C4;">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal edit -->


                <!-- Modal delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Product</h1>
                                <button type="button" class="btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus order atas nama <b>
                                            <?php echo $row['pelanggan'] ?>
                                        </b> dengan kode order <b>
                                            <?php echo $row['id_order'] ?>
                                        </b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_order_validate"
                                            value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal delete-->

                <?php
            }

            ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Order </th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu </th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row) {

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no++ ?>
                                </th>
                                <td>
                                    <?php echo $row['id_order'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pelanggan'] ?>
                                </td>
                                <td>
                                    <?php echo $row['alamat'] ?>
                                </td>
                                <td>
                                    <?php echo number_format((int) $row['total_harga'], 0, ',', '.') ?>
                                </td>
                                <td>
                                    <?php echo ((!empty($row['id_bayar']))) ? "<span class='badge text-bg-success'>dibayar</span>" : "" ; ?>
                                </td>
                                <td>
                                    <?php echo $row['waktu_order'] ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-info btn-sm me-1"
                                            href="./?x=orderitem&order= <?php echo $row['id_order'] . "&alamat=". $row['alamat'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                                                class="bi bi-eye"></i></a>

                                        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                                btn-sm me-1 disabled" : "btn btn-success btn-sm me-1"; ?>"
                                            data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>

                                        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                                btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                                            data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>