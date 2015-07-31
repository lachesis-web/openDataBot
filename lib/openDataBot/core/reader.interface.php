<?php

interface ireader {
    public function __construct($source, $settings = array());
    public function getNextLine();
}

?>
