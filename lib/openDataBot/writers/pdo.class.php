<?php

class writers_pdo implements iwriter {
    protected $tableName = null;
    protected $pdo = null;

    public function __construct($destination, $settings = array()) {
        if((count($destination) == 4)
                && array_key_exists('dsn', $destination)
                && array_key_exists('user', $destination)
                && array_key_exists('password', $destination)
                && array_key_exists('table', $destination)) {
            $this -> pdo = new PDO($destination['dsn'], $destination['user'], $destination['password']);
            $this -> tableName = $destination['table'];
        }
    }

    public function writeNextLine(array $data) {
        $fieldsNames = array_keys($data);
        $fieldsValues = array_values($data);

        $query = $this -> pdo -> prepare('INSERT INTO ' . $this -> tableName . ' (' . implode(',', $fieldsNames) . ") VALUES ('" . implode("','", $fieldsValues) . "');");
        $query -> execute();
    }
}

?>
