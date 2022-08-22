<?php
/*
Classe que só armazena propriedades $name, $age e $id.
$name e $age são configuradas no construtor e estão acessíveis com métodos de leitura.
$id pode ser configurada usando o método setId().
*/
class Person {
    private $name;
    private $age;
    private $id = 0;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}

?>