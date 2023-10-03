<?php

namespace App;

use Cassandra\Date;

class Emprunt
{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private \DateTime $dateRetour;
    private Media $mediaEmprunte;
    private Adherent $adherentEmprunteur;

    /**
     * @param \DateTime $dateRetourEstimee
     * @param \DateTime $dateRetour
     * @param Media $mediaEmprunte
     * @param Adherent $adherentEmprunteur
     */
    public function __construct(Media $mediaEmprunte, Adherent $adherentEmprunteur, ?\DateTime $dateRetour = null)
    {
        $date = \DateTime::createFromFormat("d/m/Y", \date("d/m/Y"));
        $this->dateEmprunt = $date;
        $empruntFini = \DateTime::createFromFormat("d/m/Y", $this->dateEmprunt->format("d/m/Y"));
        $this->dateRetourEstimee = $empruntFini->modify("+ {$mediaEmprunte->getDureeEmpruntMax()} days");
        $this->mediaEmprunte = $mediaEmprunte;
        $this->adherentEmprunteur = $adherentEmprunteur;
    }

    public function informationsEmprunt(): string
    {
        return "Cet emprunt a été réalisé le {$this->dateEmprunt->format("d/m/Y")} par l'adhérent numéro  {$this->adherentEmprunteur->getNumeroAdherent()}  et a une date de retour estimée a {$this->dateRetourEstimee->format("d/m/Y")}";
    }

    public function setDateRetour(string $dateRetour): void
    {
        $this->dateRetour = \DateTime::createFromFormat("d/m/Y", $dateRetour);
    }

    public function verifierEmprunt(): bool
    {
        if (isset($this->dateRetour)) {
            return false;
        } else {
            return true;
        }
    }

    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }


    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }


    public function verifierAlerteEmprunt(): bool
    {
        $dateActuelle = \DateTime::createFromFormat("d/m/Y", \date("d/m/Y"));
        if ($dateActuelle > $this->dateRetourEstimee && $this->verifierEmprunt()) {
            return true;
        } else {
            return false;
        }
    }

    public function verifierDureeAutorisee(): bool
    {
        if ($this->dateRetour < $this->dateRetourEstimee) {
            return true;
        } else {
            return false;
        }
    }

}