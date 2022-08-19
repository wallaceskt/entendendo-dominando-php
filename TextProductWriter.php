<?php
require_once("ShopProductWriter.php");

class TextProductWriter extends ShopProductWriter {

    public function write() {
        $str = "PRODUCTS:\n";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }

        print $str;
    }
    
}
?>