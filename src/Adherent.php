<?php

namespace App;

//Faire système de date etc .....
class Adherent
{
    private int $numeroAdherent;
    private string $prenomAdherent;
    private string $nomAdherent;
    private string $mailAdherent;
    private string $dateAdhesion;

    /**
     * @param int $numeroAdherent
     * @param string $prenomAdherent
     * @param string $nomAdherent
     * @param string $mailAdherent
     * @param string $dateAdhesion
     */
    public function __construct(string $prenomAdherent, string $nomAdherent, ?string $dateAdhesion)
    {
        $this->numeroAdherent = $this->genererNumero();
        $this->prenomAdherent = $prenomAdherent;
        $this->nomAdherent = $nomAdherent;

        if (isset($dateAdhesion)){
            $this->dateAdhesion = \DateTime::createFromFormat("d/m/Y","$dateAdhesion");
        }else{
            $this->dateAdhesion=date("d/m/Y");
        }


    }

    public function getNumeroAdherent(): int
    {
        return $this->numeroAdherent;
    }

    public function getPrenomAdherent(): string
    {
        return $this->prenomAdherent;
    }

    public function getNomAdherent(): string
    {
        return $this->nomAdherent;
    }

    public function getMailAdherent(): string
    {
        return $this->mailAdherent;
    }

    public function getDateAdhesion(): string
    {
        return $this->getDateAdhesion();
    }

    private function genererNumero():void{
        $structure="AD-";
        $numero=rand(1,999999);
        $this->numeroAdherent=$structure.$numero;
    }


}