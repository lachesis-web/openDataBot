<?php

class writers_array implements iwriter {
    protected $data = null;

    public function __construct($destination, $settings = array()) {
        $this -> data = &$destination;
    }

    public function writeNextLine(array $data) {
        array_push($this -> data, $data);
    }
}

?>
