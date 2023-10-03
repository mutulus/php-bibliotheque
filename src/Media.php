<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected int $dureeEmpruntMax;

    /**
     * @param string $titre
     * @param int $dureeEmpruntMax
     */
    public function __construct(string $titre, int $dureeEmpruntMax)
    {
        $this->titre = $titre;
        $this->dureeEmpruntMax = $dureeEmpruntMax;
    }

    abstract public function presenter():string;

    public function getDureeEmpruntMax(): int
    {
        return $this->dureeEmpruntMax;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }


}