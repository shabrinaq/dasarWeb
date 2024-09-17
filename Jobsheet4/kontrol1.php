<?php

$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

echo "Daftar nilai asli: " . implode(', ', $nilaiSiswa);
echo "<br>";
sort($nilaiSiswa);

echo "Setelah diurutkan dari yang terendah ke tertinggi: " . implode(', ', $nilaiSiswa);
echo "<br>";
$nilaiTengah = array_slice($nilaiSiswa, 2, count($nilaiSiswa) - 4);

echo "Setelah mengabaikan dua nilai terendah dan dua nilai tertinggi: " . implode(', ', $nilaiTengah);
echo "<br>";
$totalNilai = array_sum($nilaiTengah);

echo "Total nilai setelah mengabaikan dua nilai tertinggi dan terendah: {$totalNilai} <br>";

$rataRataNilai = $totalNilai / count($nilaiTengah);

echo "Rata-rata nilai setelah mengabaikan dua nilai tertinggi dan terendah: {$rataRataNilai} <br>";
?>
