<?php
require_once("ShopProduct.php");
require_once("CdProduct.php");
require_once("BookProduct.php");

abstract class ShopProductWriter {

    protected $products = array();

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    abstract public function write();

}
?>