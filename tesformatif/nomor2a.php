<?php
    function selesaikanDeret($n) {
        $deret = array();
        $angka = 4; // Angka awal
        $tambahan = 2; // Angka yang ditambahkan setiap langkah

        while (count($deret) < $n) {
            $deret[] = $angka;
            $angka += $tambahan;
            $tambahan++;
        }

        return $deret;
    }

    $n = 7; // Ganti dengan jumlah angka yang ingin Anda tampilkan
    $deretHasil = selesaikanDeret($n);

    foreach ($deretHasil as $angka) {
        echo $angka . " ";
    }
?>
