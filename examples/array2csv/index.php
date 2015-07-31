<?php

require_once('../../lib/openDataBot/loader.inc.php');

$dataObject = factory::reader(new readers_array(array(
    array(
        'firstName' => 'John',
        'lastName' => 'Doe'
    ),
    array(
        'firstName' => 'Patrick',
        'lastName' => 'Smith'
    )
)));

$writer = factory::writer(  $dataObject,
                            new writers_csv('destination.csv'));

?>
