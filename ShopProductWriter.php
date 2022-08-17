<?php
require_once "ShopProduct.php";
require_once "CdProduct.php";
require_once "BookProduct.php";

class ShopProductWriter {

    private $products = array();

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    public function write($shopProduct) {
        // O operador instanceof é resolvido como true se o objeto operando à esquerda for do tipo representado pelo operando à direita
        if(!($shopProduct instanceof CdProduct) && !($shopProduct instanceof BookProduct)) {
            die("wrong type supplied");
        }

        $str = "";

        foreach ($this->products as $shopProduct) {
            $str = "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }

        print $str;
    }

}
?>