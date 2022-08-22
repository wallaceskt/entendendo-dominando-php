<?php
require_once("DB.php");
require_once("Person.php");
require_once("PersonPersist.php");

$person = new Person('Lorena', 13);

try {
    $saver = new PersonPersist();
    $saver->insert($person);
} catch (Exception $e) {// \Throwable $th
    // throw $e;
    // echo "<pre>";
    // var_dump($e);
    die($e->getMessage());
}

if ($saver) {
    echo "OK";
}
?>