<?php
require "./vendor/autoload.php";
// Autres
$adherentBis = new \App\Adherent("Tom", "Dupond");

echo "Test:  vérifier que la date d’emprunt, à la création, est égale à la date du jour  \n";
//Arrange
$livre = new \App\Livre("la jungle", "21", "AD8878", "Michel", 154);

$emprunt1 = new \App\Emprunt($livre, $adherentBis);
//Act
$dateEmprunt = $emprunt1->getDateEmprunt();
//Assertion
if ($dateEmprunt == DateTime::createFromFormat("d/m/Y", date("d/m/Y"))) {
    echo "TEST OK" . PHP_EOL;
} else {
    echo "TEST PAS OK" . PHP_EOL;
}

echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 21 jours pour l’emprunt d’un livre: \n";

//Arange utilisation de livre au dessus et de emprunt1
//Act
$dateRetour=$emprunt1->getDateRetourEstimee();
//Assert
$date=DateTime::createFromFormat("d/m/Y",date("d/m/Y"));

$date->modify("+21 days");
if ($dateRetour==$date){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}

echo "Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un blu-ray: \n";

//Arrange
$blueRay=new \App\BlueRay("Avatar",15,"Di caprio",152,2010);
$emprunt2=new \App\Emprunt($blueRay,$adherentBis);
//Act
$dateRetour2=$emprunt2->getDateRetourEstimee();
//Assertion
$date2=DateTime::createFromFormat("d/m/Y",date("d/m/Y"));

$date2->modify("+15 days");
if ($dateRetour2==$date2){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}



echo "• Test : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine \n";

//Arrange
$magazine=new \App\Magazine("Vogue",10,2544,"01/01/2023");
$emprunt3=new \App\Emprunt($magazine,$adherentBis);
//Act
$dateRetour3=$emprunt3->getDateRetourEstimee();
//Assertion
$date3=DateTime::createFromFormat("d/m/Y",date("d/m/Y"));

$date3->modify("+10 days");
if ($dateRetour3==$date3){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}