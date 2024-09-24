<?php

$loremIpsum = "Lorem Ipsum dolor sit amet consectetue adipisicing elit.
    Voluptatem reprehenderit nobit veritatis commodi fugiat molestias
    impedit unde ipsum coluptatum, correpti minus sit exxeptri nostrum
    quisquam? Quos impedit eum nulla optio.";

echo "<p>{$loremIpsum}</p>";
echo "Panjang karakter: " . strlen($loremIpsum) . "<br>";
echo "Panjang kata: " . str_word_count($loremIpsum) . "<br>";
echo "<p>" . strtoupper($loremIpsum) . "</p>";
echo "<p>" . strtolower($loremIpsum) . "</p>";

?>