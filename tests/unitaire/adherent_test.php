<?php
require "./vendor/autoload.php";
require_once "tests/utils/couleurs.php";
echo GREEN."###########################################################";
echo  PHP_EOL;
echo "• Test : vérifier que la date du jour, si pas précisée est égale à la date du jour  \n";
//Arrange
$adherent1=new \App\Adherent("Michel","Francois");
//Act
$dateAdhesion=$adherent1->getDateAdhesion();
//Assertion
if ($dateAdhesion==DateTime::createFromFormat("d/m/Y",date("d/m/Y"))){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}


echo  PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo "• Test : vérifier que la date d’adhésion, si précisée à la création, est bien prise en compte \n";
//Arrange
$adherent2=$adherent1=new \App\Adherent("Michel","Francois","14/02/2023");
//Act
$dateAdhesion2=$adherent2->getDateAdhesion();
//Assertion
if ($dateAdhesion2==DateTime::createFromFormat("d/m/Y","14/02/2023")){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}

echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo "• Test :  vérifier que le numéro d’adhérent, à la création, est valide \n";
//Arrange: utilisation adherent1
//Act
$numero=$adherent1->getNumeroAdherent();
//Assertion Verification graphique du numéro Adherant
echo "Le numéro doit ressembler à: AD-999999 // Numéro adhérent =  ".$numero.PHP_EOL;


echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo "• Test : vérifier que l’adhésion est valable (valide) quand la date d’adhésion n’est pas dépassée (moins d’un an) \n";
//Arrange: utilisation adherent2 qui est crée avec une date d'adhésion datant de moins de 1 an donc normalement valide
//Act
$adhesion=$adherent2->adhesionValable();
//Asserrtion
if ($adhesion){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}


echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo "• Test : vérifier que l’adhésion est non valable (invalide) quand la date d’adhésion est dépassée (plus d’un an) \n";

//Arrange
$adherent3=new \App\Adherent("Jean","Michel","10/02/2022");
//Act
$adhesion2=$adherent3->adhesionValable();
//Assertion
if ($adhesion2==false){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}

echo PHP_EOL;
echo "###########################################################";
echo PHP_EOL;
echo "• Test : vérifier que l’adhésion est renouvelée \n";
//Arrange création d'un adhérent avec un abonnement périmé
$adherent4=new \App\Adherent("Francis","Marie","14/01/2020");
//Act
$adherent4->renouvelerAdhesion();
//Asserttion
if ($adherent4->adhesionValable()){
    echo "TEST OK".PHP_EOL;
}else{
    echo "TEST PAS OK".PHP_EOL;
}