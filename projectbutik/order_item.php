<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(tb_daftar_product.harga * tb_list_order.jumlah) AS harganya FROM tb_list_order 
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN tb_daftar_product ON tb_daftar_product.id = tb_list_order.product
    GROUP BY id_list_order
    HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$pelanggan = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    // $kode = $record['id_order'];
    $alamat = $record['alamat'];
    // $pelanggan = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT id,nama_product FROM tb_daftar_product");
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadgambar">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating mb-2">
                        <input disabled type="text" class="form-control" id="alamat" value="<?php echo $alamat; ?>">
                        <label for="uploadgambar">Alamat</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="pelanggan"
                            value="<?php echo $pelanggan; ?>">
                        <label for="uploadgambar">Pelanggan</label>
                    </div>
                </div>

                <!-- Modal Tambah Item Baru -->
                <div class="modal fade" id="tambahitem" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Orderan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php"
                                    method="POST">
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="product" id="">
                                                    <option selected hidden value="">Pilih Product</option>
                                                    <?php
                                                    foreach ($select_menu as $value) {
                                                        echo "<option value=$value[id]>$value[nama_product]</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="product">Product</label>
                                                <div class="invalid-feedback">
                                                    Pilih Product.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Jumlah Porsi" name="jumlah" required>
                                                <label for="floatingInput">Jumlah Product</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jumlah Product.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn " name="input_orderitem_validate" value="12345"
                                            style="background-color: #FFE4C4;">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Modal Tambah item Baru -->
                <?php
                if (empty($result)) {
                    echo "";
                } else {
                    foreach ($result as $row) {
                        ?>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">View Data Product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php"
                                            method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                            <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                            <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                            <input type="hidden" name="kode" value="<?php echo $kode ?>">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="product" id="">
                                                            <option selected hidden value="">Pilih Product</option>
                                                            <?php
                                                            foreach ($select_menu as $value) {
                                                                if ($row['product'] == $value['id']) {
                                                                    echo "<option selected value=$value[id]>$value[nama_product]</option>";
                                                                } else {
                                                                    echo "<option value=$value[id]>$value[nama_product]</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="product">Product</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Product.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput"
                                                            placeholder="Jumlah Porsi" name="jumlah" required
                                                            value="<?php echo $row['jumlah'] ?>">
                                                        <label for="floatingInput">Jumlah</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jumlah Product.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn" name="edit_orderitem_validate" value="12345"
                                                    style="background-color: #FFE4C4;">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->


                        <!-- Modal Delete -->
                        <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Product</h1>
                                        <button type="button" class="btn-danger" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php"
                                            method="POST">
                                            <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                            <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                            <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                            <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                            <div class="col-lg-12">
                                                Apakah anda ingin menghapus product <b>
                                                    <?php echo $row['nama_product'] ?>
                                                </b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="delete_orderitem_validate"
                                                    value="12345">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Delete-->

                        <?php
                    }
                    ?>


                    <!-- Modal Bayar -->
                    <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($result as $row) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row['nama_product'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['product'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 1) {
                                                                echo "<span class='badge text-bg-warning'>terima</span>";
                                                            } elseif ($row['status'] == 2) {
                                                                echo "<span class='badge text-bg-primary'>terkirim</span>";
                                                            } else {
                                                                // Tidak ada tindakan, atau Anda dapat menampilkan pesan default jika diperlukan
                                                            }
                                                            ?>
                                                        </td>


                                                        <td>
                                                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $total += $row['harganya'];
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="fw-bold">
                                                        Total Harga
                                                    </td>
                                                    <td class="fw-bold">
                                                        <?php echo number_format($total, 0, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukan
                                        Pembayaran?</span>
                                    <form class="needs-validation" novalidate action="proses/proses_bayar.php"
                                        method="POST">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="total" value="<?php echo $total ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Nominal Uang" name="uang" required>
                                                    <label for="floatingInput">Nominal Uang</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nominal Uang.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn" name="bayar_validate" value="12345"
                                                style="background-color: #ffff66;">Bayar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal Bayar -->

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th scope="col">Product</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($result as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['nama_product'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?>

                                        </td>
                                        <td>
                                            <?php echo $row['product'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>terima</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-primary'>terkirim</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                                btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i
                                                        class="bi bi-pencil-square"></i></button>

                                                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                                btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                                                        class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $total += $row['harganya'];
                                }
                                ?>
                                <tr>
                                    <td colspan="5" class="fw-bold">
                                        Total Harga
                                    </td>
                                    <td class="fw-bold">
                                        <?php echo number_format($total, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
                <div>
                    <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>"
                        data-bs-toggle="modal" data-bs-target="#tambahitem"><i class="bi bi-plus-circle"></i>
                        Item</button>
                    <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>"
                        data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-currency-dollar"></i>
                        Bayar</button>

                </div>
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