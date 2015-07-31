<?php

class readers_csv implements ireader {
    public $firstLineAsNames = true;
    protected $delimiter = ',';
    protected $fileHandler = null;

    public function __construct($source, $settings = array()) {
        if(is_file($source) && is_readable($source)) {
            if(($fileHandler = fopen($source, 'r')) !== false) {
                if(array_key_exists('delimiter', $settings)) {
                    $this -> delimiter = $settings['delimiter'];
                }

                $this -> fileHandler = $fileHandler;
            }
        }
    }

    public function getNextLine() {
        if(!is_null($this -> fileHandler)) {
            if($lineData = fgetcsv($this -> fileHandler, 0, $this -> delimiter)) {
                return($lineData);
            } else {
                return(false);
            }
        } else {
            return(null);
        }
    }
}

?>
