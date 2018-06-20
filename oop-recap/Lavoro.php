<?php

include 'vendor/autoload.php';


$sid = new CorsoOOP\Lavoratore('Sid');

$staff = new CorsoOOP\Staff([$sid]);

$acme = new CorsoOOP\Azienda($staff);

$tom = new CorsoOOP\Lavoratore('Tom');

$acme->assumi($tom);



var_dump($acme->mostraListaLavoratori());
