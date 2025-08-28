<?php
function get_product_price($name) {
    $products = array(
        "pen" => 1.50,
        "book" => 5.00,
        "pencil" => 0.80,
        "eraser" => 0.60
    );

    return isset($products[$name]) ? $products[$name] : null;
}
?>
