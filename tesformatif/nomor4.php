<?php
    // Fungsi untuk mencari nilai maksimum dari tiga bilangan
    function cariMax($nilai1, $nilai2, $nilai3) {
        $max = $nilai1;

        if ($nilai2 > $max) {
            $max = $nilai2;
        }

        if ($nilai3 > $max) {
            $max = $nilai3;
        }

        return $max;
    }

    // Contoh penggunaan fungsi
    $angka1 = 10;
    $angka2 = 25;
    $angka3 = 15;

    $nilaiMax = cariMax($angka1, $angka2, $angka3);

    echo "Nilai maksimum dari $angka1, $angka2, dan $angka3 adalah $nilaiMax";
?>