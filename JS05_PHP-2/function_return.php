<?php

function hitungUmur($thn_lahir, $thn_sekrang){
    $umur = $thn_sekrang - $thn_lahir;
    return $umur;
}
function perkenalan ($nama, $salam="Assalamualaikum") {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";

    echo "Saya berusia ". hitungUmur(1988, 2024) ." tahun<br/>";
}

perkenalan("Elok");

?>