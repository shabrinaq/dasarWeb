<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Tambah: {$hasilTambah} <br>";
echo "Hasil Kurang: {$hasilKurang} <br>";
echo "Hasil Kali: {$hasilKali} <br>";
echo "Hasil Bagi: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<br>";

var_dump($hasilSama);
echo "<br>";
var_dump($hasilTidakSama);
echo "<br>";
var_dump($hasilLebihKecil);
echo "<br>";
var_dump($hasilLebihBesar);
echo "<br>";
var_dump($hasilLebihKecilSama);
echo "<br>";
var_dump($hasilLebihBesarSama);
echo "<br>";

echo "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

var_dump($hasilAnd);
echo "<br>";
var_dump($hasilOr);
echo "<br>";
var_dump($hasilNotA);
echo "<br>";
var_dump($hasilNotB);
echo "<br>";

echo "<br>";

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

echo "Hasil a += b: {$a} <br>";
echo "Hasil a -= b: {$a} <br>";
echo "Hasil a *= b: {$a} <br>";
echo "Hasil a /= b: {$a} <br>";
echo "Hasil a %= b: {$a} <br>";
echo "<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

var_dump($hasilIdentik);
echo "<br>";
var_dump($hasilTidakIdentik);
echo "<br>";
?>