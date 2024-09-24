<?php

function hitungUmur($thn_lahir, $thn_sekrang){
    $umur = $thn_sekrang - $thn_lahir;
    return $umur;
}

echo "umur saya adalah ". hitungUmur(1988, 2024) ."tahun"

?>