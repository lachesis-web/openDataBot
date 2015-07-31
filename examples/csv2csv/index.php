<?php

require_once('../../lib/openDataBot/loader.inc.php');

$dataObject = factory::reader(new readers_csv('./source.csv'));

$dataObject -> setColumnName(0, 'First name');
$dataObject -> setColumnName(1, 'Last name');

$writer = factory::writer(  $dataObject,
                            new writers_csv('destination.csv'));

?>
