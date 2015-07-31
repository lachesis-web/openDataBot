<?php

class readers_pdo implements ireader {
    public $firstLineAsNames = false;
    protected $data = null;

    public function __construct($source, $settings = array()) {
        if((count($source) == 4)
                && array_key_exists('dsn', $source)
                && array_key_exists('user', $source)
                && array_key_exists('password', $source)
                && array_key_exists('table', $source)) {
            $pdo = new PDO($source['dsn'], $source['user'], $source['password']);
            $query = $pdo -> prepare('SELECT * FROM ' . $source['table'] . ';');
            $query -> execute();

            if($query -> columnCount() > 0) {
                $this -> data = $query -> fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function getNextLine() {
        $item = current($this -> data);
        next($this -> data);
        return($item);
    }
}

?>
