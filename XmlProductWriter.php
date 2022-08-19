<?php
require_once("ShopProductWriter.php");

class XmlProductWriter extends ShopProductWriter {

    public function write() {
        $str = "<products>\n";
            foreach ($this->products as $shopProduct) {
                $str .= "\<product title=\"{$shopProduct->getTitle()}\">t\n";
                $str .= "\t\t<summary>\n";
                $str .= "\t\t{$shopProduct->getSummaryLine()}\n";
                $str .= "\t\t</summary>\n";
                $str .= "\t</product>\n";
            }
        $str .= "</products>\n";

        print $str;
    }
    
}
?>