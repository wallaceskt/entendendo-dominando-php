<?php
require_once "ShopProduct.php";
require_once "CdProduct.php";
require_once "BookProduct.php";
require_once "ShopProductWriter.php";

$product1 = new ShopProduct("My Antonia", "Cather", "Willa", 5.99);

print("<pre>");
print "author: " . $product1->getProducer();
print("<br>");
print "The price is " . $product1->getPrice() . "\n";
?>