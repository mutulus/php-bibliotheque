<?php

namespace App;

class Livre extends Media
{
    private string $isbn;
    private string $auteur;
    private int $nbPages;

    public function __construct(string $titre, int $dureeEmpruntMax,string $isbn,string $auteur,int $nbPages)
    {
        parent::__construct($titre, $dureeEmpruntMax);
        $this->isbn=$isbn;
        $this->auteur=$auteur;
        $this->nbPages=$nbPages;
    }
    public function presenter(): string
    {
        // TODO: Implement presenter() method.
        return "Voici les caractéristiques du livre: ISBN: {$this->isbn}, Titre: {$this->titre}, Auteur: {$this->auteur}, Nombre de pages: {$this->nbPages}";
    }
}