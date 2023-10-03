<?php

namespace App;

class Magazine extends Media
{
    private int $numero;
    private \DateTime $datePublication;

    public function __construct(string $titre, int $dureeEmpruntMax, int $numero,string$datePublication)
    {
        parent::__construct($titre, $dureeEmpruntMax);
        $this->numero=$numero;
        $this->datePublication=\DateTime::createFromFormat("d/m/Y",$datePublication);
    }
    public function presenter(): string
    {
        // TODO: Implement presenter() method.
        return "Voci les caractéristiques du magazine: Titre: {$this->titre}, Numero: {$this->numero}, Date de publication: {$this->datePublication->format("d/m/Y")}";
    }
}