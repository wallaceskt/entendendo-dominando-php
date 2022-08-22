<?php
require_once("DB.php");
require_once("Person.php");

/*
Classe que grava dados do objeto Person em um banco de dados.
Ela vai ser o ímã real de erros
*/
class PersonPersist {
    private $db_obj;

    public function connect() {
        $this->db_obj = Connect::getConnection();

        if (!$this->db_obj) {
            throw new Exception("Erro de conexão");
        }
    }

    public function insert(Person $person) {
        try {
            if (empty($this->db_obj)) {
                $this->connect();
            }
        } catch (Exception $e) {
            throw $e;
        }

        $n = $person->getName();
        $a = $person->getAge();

        $stmt = $this->db_obj->prepare("INSERT INTO persons (name, age) VALUES (:n, :a)");

        $stmt->bindParam(':n', $n);
        $stmt->bindParam(':a', $a);
        $stmt->execute();
        // var_dump($stmt);die();

        // return $this->db_obj->lastInsertId() + 1;
    }
}

?>