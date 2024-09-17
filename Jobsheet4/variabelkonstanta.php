<?php
$angka1 = 10;
$angka2 = 5;
$hasil = $angka1 + $angka2;
echo "Hasil penjumlahan $angka1 dan $angka2 adalah $hasil.";

$benar = true;
$salah = false;
echo "Variabel benar: $benar, Variabel salah: $salah";

// Mendefinisian konstanta untuk nilai tetap
define("NAMA_STATUS", "WebsiteKu.com");
define("TAHUN_PENDIRIAN", 2023);

echo "Selamat datang di " . NAMA_STATUS . ", situs yang dididrikan
pada tahun " . TAHUN_PENDIRIAN . ".";
?>