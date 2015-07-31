<?php

require_once('../../lib/openDataBot/loader.inc.php');

$dataObject = factory::reader(new readers_csv('./source.csv'));

$dataObject -> setColumnName(0, 'dbField_firstName');
$dataObject -> setColumnName(1, 'dbField_lastName');

$writer = factory::writer(  $dataObject,
                            new writers_pdo(array(  'dsn'       => 'mysql:host=127.0.0.1;dbname=dbname',
                                                    'user'      => 'user',
                                                    'password'  => 'password',
                                                    'table'     => 'table')));

?>
