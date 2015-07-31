<?php

$filesRoot = dirname(__FILE__) . '/';

require_once($filesRoot . 'core/dataObject.class.php');
require_once($filesRoot . 'core/factory.class.php');
require_once($filesRoot . 'core/reader.interface.php');
require_once($filesRoot . 'core/writer.interface.php');

$readersList = glob($filesRoot . 'readers/*.class.php');
$writersList = glob($filesRoot . 'writers/*.class.php');
if(is_array($readersList) && count($readersList) > 0) {
    foreach($readersList as $reader) {
        require_once($reader);
    }
}

if(is_array($writersList) && count($writersList) > 0) {
    foreach($writersList as $writer) {
        require_once($writer);
    }
}

?>
