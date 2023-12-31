<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_product");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
$query_chart = mysqli_query($conn, "SELECT nama_product, tb_daftar_product.id, SUM(tb_list_order.jumlah) AS total_jumlah FROM tb_daftar_product
    LEFT JOIN tb_list_order ON tb_daftar_product.id = tb_list_order.product
    GROUP BY tb_daftar_product.id
    ORDER BY tb_daftar_product.id ASC");

// $result_chart = array();
while ($record_chart = mysqli_fetch_array($query_chart)) {
    $result_chart[] = $record_chart;
}

$array_product = array_column($result_chart, 'nama_product');
$array_product_qoute = array_map(function ($product){
    return "'".$product."'";
}, $array_product);
$string_product = implode(',', $array_product_qoute);
// echo $string_menu."\n";

$array_jumlah_pesanan = array_column($result_chart, 'total_jumlah');
$string_jumlah_pesanan = implode (',', $array_jumlah_pesanan);
// echo $string_jumlah_pesanan;

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="col-lg-9 mt-2">
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $dataTombol) {
                ($firstSlideButton) ? $aktif = "active" : $aktif = "";
                $firstSlideButton = false;
                ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>"
                    class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
                <?php
                $slide++;
            } ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $data) {
                ($firstSlide) ? $aktif = "active" : $aktif = "";
                $firstSlide = false;
                ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid"
                        style="height: 250px; width: 1000px; object-fit: cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>
                            <?php echo $data['nama_product'] ?>
                        </h5>
                        <p>
                            <?php echo $data['keterangan'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- AKhir Carousel -->

    <!-- Judul -->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">Niarbutik - Aplikasi Pemesanan Baju</h5>
            <p class="card-text">Aplikasi berbasis web yang dirancang untuk memudahkan pengelolaan dan penjualan produk pada sebuah butik atau toko. Aplikasi ini menawarkan platform yang user-friendly untuk pemilik butik, karyawan, dan pelanggan.</p>
            <a href="order" class="btn" style="background-color: #FFE4C4;">Buat Order</a>
        </div>
    </div>
    <!-- AKhir Judul -->

    <!-- Chart -->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
            
            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php echo $string_product ?>],
                        datasets: [{
                            label: 'Jumlah Porsi Terjual',
                            data: [<?php echo $string_jumlah_pesanan ?>],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(233, 99, 136, 0.31)','rgba(82, 159, 246, 0.66)','rgba(233, 247, 116, 0.94)','rgba(107, 255, 0, 0.41)','rgba(205, 89, 207, 0.69)','rgba(226, 121, 37, 0.68)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <!-- AKhir Chart -->

</div>