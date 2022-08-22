<?php
// require_once("PathPear.php");
require_once("DB.php");
require_once("Chargeable.php");
// require_once("/Users/wallaceoliveira/pear/share/pear/DB.php");

class ShopProduct implements Chargeable {

    private $title = "default product";
    private $producerMainName = "main name";
    private $producerFirstName = "first name";
    protected $price;
    private $discount = 0;
    private $id = 0;

    public function __construct($title, $firstName, $mainName, $price) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducerFirstName() {
        return $this->producerFirstName;
    }

    public function getProducerMainName() {
        return $this->producerMainName;
    }

    public function setDiscount($num) {
        $this->discount = $num;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return ($this->price - $this->discount);
    }

    public function getProducer() {
        return "{$this->producerFirstName}" . " {$this->producerMainName}";
    }

    public function getSummaryLine() {
        $base = "{$this->title}" . " ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";

        return $base;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public static function getInstance($id, PDO $db) {
        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // $result = $stmt->execute();

        // if (Connect::isError($result)) {
        //     $erro = "[ERRO {$db->errorInfo()[0]}] ";
        //     $erro .= $db->errorInfo()[2];

        //     die($erro);
        // }

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($row)) { return null; }

        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'], 
                $row['firstname'], 
                $row['mainname'], 
                $row['price'], 
                $row['numpages']
            );
        } elseif ($row['type'] == "cd") {
            $product = new CdProduct(
                $row['title'], 
                $row['firstname'], 
                $row['mainname'], 
                $row['price'], 
                $row['playlength']
            );
        } else {
            $product = new ShopProduct(
                $row['title'], 
                $row['firstname'], 
                $row['mainname'], 
                $row['price']
            );
        }

        $product->setId($row['id']);
        $product->setDiscount($row['discount']);

        return $product;
    }

}
?>