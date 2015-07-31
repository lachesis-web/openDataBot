<?php

class writers_csv implements iwriter {
    protected $delimiter = ',';
    protected $fileHandler = null;

    public function __construct($destination, $settings = array()) {
        if(is_writable($destination)) {
            if(($fileHandler = fopen($destination, 'w')) !== false) {
                if(array_key_exists('delimiter', $settings)) {
                    $this -> delimiter = $settings['delimiter'];
                }

                $this -> fileHandler = $fileHandler;
            }
        }
    }

    public function writeNextLine(array $data) {
        if(!is_null($this -> fileHandler)) {
            $writtenBytes = fputcsv($this -> fileHandler, $data, $this -> delimiter);

            return($writtenBytes != false && $writtenBytes > 0);
        }
    }
}

?>
