<?php

namespace App;

class BlueRay extends Media
{
    private string $realisateur;
    private int $dureeMinutes;
    private int $anneeSortie;

    public function __construct(string $titre, int $dureeEmpruntMax, string $realisateur, int $dureeMinutes, int $anneeSortie)
    {
        parent::__construct($titre, $dureeEmpruntMax);
        $this->realisateur = $realisateur;
        $this->dureeMinutes = $dureeMinutes;
        $this->anneeSortie = $anneeSortie;
    }

    public function presenter(): string
    {
        // TODO: Implement presenter() method.
        return "Voici les caractéristiques de ce Blue-Ray : Titre: {$this->titre}, Réalisateur: {$this->realisateur}, Durée: {$this->dureeMinutes} minutes, Année de sortie: {$this->anneeSortie}";
    }


}