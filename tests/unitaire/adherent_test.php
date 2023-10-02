<?php
require "./vendor/autoload.php";
$adherent=new App\Adherent("Tom","Dupont","01/05/2023");
echo $adherent->getPrenomAdherent();
echo PHP_EOL;
echo $adherent->getNomAdherent();
echo PHP_EOL;
echo $adherent-> getDateAdhesion();
