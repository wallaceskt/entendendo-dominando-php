<?php
class PersonWriter {
    function writeName(Person $p) {
        print $p->getName() . "\n";
    }

    function writeAge(Person $p) {
        print $p->getAge() . "\n";
    }
}

class Person {
    private $writer;

    function __construct(PersonWriter $writer) {
        $this->writer = $writer;
    }

    function __call($methodname, $args) {
        if (method_exists($this->writer, $methodname)) {
            return $this->writer->$methodname($this);
        }
    }

    function getName() {return "Bob";}
    function getAge() {return 44;}
}

$person = new Person(new PersonWriter());
$person->writeName();

// A função retorna true se o objeto for uma instância do tipo Person
if (is_a($person, 'Person')) {
    print "<br>\$person is a Person object\n";
}

if (get_class($person) == 'Person') {
    print "<br>\$person is a Person object\n";
}

if ($person instanceof Person) {
    print "<br>\$person is a Person object\n";
}

$method = "getAge";

// print $person->$method();

if (in_array($method, get_class_methods('Person'))) {
    print $person->$method(); // invoke the method
}
?>