<?php

class readers_array implements ireader {
    public $firstLineAsNames = false;
    protected $data = null;

    public function __construct($source, $settings = array()) {
        if(is_array($source)) {
            $this -> data = $source;
        }
    }

    public function getNextLine() {
        $item = current($this -> data);
        next($this -> data);
        return($item);
    }
}

?>
