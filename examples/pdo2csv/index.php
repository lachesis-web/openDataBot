<?php

require_once('../../lib/openDataBot/loader.inc.php');

$dataObject = factory::reader(new readers_pdo(array('dsn'       => 'mysql:host=127.0.0.1;dbname=dbname',
                                                    'user'      => 'user',
                                                    'password'  => 'password',
                                                    'table'     => 'table')));

$dataObject -> setColumnName(0, 'firstName');
$dataObject -> setColumnName(1, 'lastName');

$writer = factory::writer(  $dataObject,
                            new writers_csv('destination.csv'));

?>
