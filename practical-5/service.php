<?php
require_once __DIR__ . '/../lib/nusoap.php';
require_once("data.php");

$server = new nusoap_server();
$server->configureWSDL("ProductService", "urn:ProductService");

$server->register(
    "get_price",
    array("name" => "xsd:string"),
    array("return" => "xsd:double")
);

function get_price($name) {
    return get_product_price($name);
}

$server->service(file_get_contents("php://input"));
?>
