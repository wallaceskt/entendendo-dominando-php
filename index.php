<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entendendo e Dominando o PHP</title>
</head>

    <body>

        <?php
        // require_once("PathPear.php");
        require_once("DB.php");
        require_once("ShopProduct.php");
        require_once("CdProduct.php");
        require_once("BookProduct.php");
        require_once("ShopProductWriter.php");

        echo("<pre>");
        $db = Connect::getConnection();
        $obj = ShopProduct::getInstance(1, $db);
        print_r($obj->getTitle());

        $product1 = new ShopProduct("My Antonia", "Cather", "Willa", 5.99);

        print("<br>");
        print "author: " . $product1->getProducer();
        print("<br>");
        print "The price is " . $product1->getPrice() . "\n";
        ?>

    </body>

</html>