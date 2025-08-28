<?php
require "data.php";

// Tell browser we are returning JSON
header("Content-Type: application/json");

// Check if a "name" was passed in the URL
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $price = get_product_price($name);

    if ($price !== null) {
        echo json_encode(["data" => $price]);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
} else {
    echo json_encode(["error" => "No product name given"]);
}
?>
