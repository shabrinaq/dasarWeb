<?php

$hargaAwal = 120000;
$diskonPersen = 20;

if ($hargaAwal > 100000) {
    $jumlahDiskon = $hargaAwal * ($diskonPersen / 100);
    $hargaSetelahDiskon = $hargaAwal - $jumlahDiskon;
} else {
    $hargaSetelahDiskon = $hargaAwal;
}
echo "<br>";
echo "Harga setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.');
?>
