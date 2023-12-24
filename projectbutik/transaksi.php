<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_order 
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN tb_daftar_product ON tb_daftar_product.id = tb_list_order.product
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order ORDER BY waktu_order ASC");


while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;

}

$select_product = mysqli_query($conn, "SELECT id,nama_product FROM tb_daftar_product");
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Transaksi
        </div>
        <div class="card-body">


            <?php
            if (empty($result)) {
                echo "Data Product Tidak Ada";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Terima  -->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Data Product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_orderitem.php"
                                        method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="product" id="">
                                                        <option selected hidden value="">Pilih Product</option>
                                                        <?php
                                                        foreach ($select_product as $value) {
                                                            if ($row['product'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_product]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_product]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="product">Daftar Product</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Product.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="Jumlah Porsi" name="jumlah" required
                                                        value="<?php echo $row['product'] ?>">
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
                                            <button type="submit" class="btn" name="terima_orderitem_validate" value="12345"
                                                style="background-color: #FFE4C4">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Terima  -->

                    <!-- Modal selesai -->
                    <div class="modal fade" id="selesai<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Selesai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_selesai_orderitem.php"
                                        method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="product" id="">
                                                        <option selected hidden value="">Pilih Product</option>
                                                        <?php
                                                        foreach ($select_product as $value) {
                                                            if ($row['product'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_product]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_product]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="product">Daftar Product</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Product.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="Jumlah Porsi" name="jumlah" required
                                                        value="<?php echo $row['jumlah'] ?>">
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
                                            <button type="submit" class="btn" name="selesai_orderitem_validate" value="12345"
                                                style="background-color: #FFE4C4">Terkirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal selesai -->

                    <?php
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if ($row['status'] != 2) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['kode_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_product'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['product'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>terima</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-primary'>selesai</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary
                                                btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#terima<?php echo $row['id_list_order'] ?>">Terima</button>

                                                <button
                                                    class="<?php echo (empty($row['status']) || $row['status'] != 1) ?
                                                        "btn btn-secondary btn-sm me-1 disabled" : "btn btn-success btn-sm me-1 text-nowrap"; ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#selesai<?php echo $row['id_list_order'] ?>">Selesai</button>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
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