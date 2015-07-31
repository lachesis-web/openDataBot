<?php

interface iwriter {
    public function __construct($destination, $settings = array());
    public function writeNextLine(array $data);
}

?>
