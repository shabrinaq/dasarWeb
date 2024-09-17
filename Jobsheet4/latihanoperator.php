<?php

$totalSeats = 45;
$occupiedSeats = 28;
$emptySeats = $totalSeats - $occupiedSeats;
$persentaseEmptySeats = ($emptySeats / $totalSeats) * 100;

echo "Total Seats: {$totalSeats} <br>";
echo "Occupied Seats: {$occupiedSeats} <br>";
echo "Empty Seat: {$emptySeats} <br>";
echo "Persentase Empty Seats: {$persentaseEmptySeats} <br>";
?>