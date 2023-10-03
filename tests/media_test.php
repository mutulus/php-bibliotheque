<?php
require "./vendor/autoload.php";
require_once "tests/utils/couleurs.php";
$magazine=new \App\Magazine("Le vogue",10,1548,"15/09/2023");
$livre=new \App\Livre("Maze runner",21,"GF8874","Jean",452);
$blueRay=new \App\BlueRay("Avatar",15,"Michel",125,2010);
echo YELLOW."###########################################################";
echo  PHP_EOL;
echo $blueRay->presenter();
echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo $livre->presenter();
echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo $magazine->presenter();


