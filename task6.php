/*
6. Write a code to create a ‘CSV’ file named ‘laptop.csv’ with column names as listed:
a. Title
b. Price
c. Brand
from JSON data. (available at https://dummyjson.com/products/search?q=Laptop)
*/




<?php

function json2CSV()
{
    $json = file_get_contents('https://dummyjson.com/products/search?q=Laptop');
    $data = json_decode($json, true);
    $product = $data['products'];
    $output = [['title' => 'Title', 'price' => 'Price', 'brand' => 'Brand']];
    foreach($product as $item) {
        $output[] = [
            'title' => $item['title'],
            'price' => $item['price'],
            'brand' => $item['brand']
        ];
    }
    $csv = fopen('laptop.csv', 'w');
    foreach ($output as $row) {
        fputcsv($csv, $row);
    }
    fclose($csv);
}

json2CSV();

?>
