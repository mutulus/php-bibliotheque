<?php

namespace App;

//Faire système de date etc .....
use Cassandra\Date;

class Adherent
{
    private string $numeroAdherent;
    private string $prenomAdherent;
    private string $nomAdherent;
    private string $mailAdherent;
    private \DateTime $dateAdhesion;

    /**
     * @param string $numeroAdherent
     * @param string $prenomAdherent
     * @param string $nomAdherent
     * @param string $mailAdherent
     * @param string $dateAdhesion
     */
    public function __construct(string $prenomAdherent, string $nomAdherent, ?string $dateAdhesion=null)
    {
        $this->genererNumero();
        $this->prenomAdherent = $prenomAdherent;
        $this->nomAdherent = $nomAdherent;

        if (isset($dateAdhesion)){
            $this->dateAdhesion = \DateTime::createFromFormat("d/m/Y","$dateAdhesion");
        }else{
            $this->dateAdhesion=\DateTime::createFromFormat("d/m/Y",date("d/m/Y"));
        }


    }


    private function genererNumero():void{
        $structure="AD-";
        $numero=rand(100000,999999);
        $this->numeroAdherent=$structure.$numero;
    }

    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }

    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesion;
    }


    public function informationsAdherent():string{
        return "Cet(te) adhérent(e) s'appelle {$this->prenomAdherent} {$this->nomAdherent}, son numéro d'adhérent est {$this->numeroAdherent}, sa date d'adhésion est {$this->dateAdhesion->format("d/m/Y")}";
    }

    public function renouvelerAdhesion():void{
        $dateActuelle=\DateTime::createFromFormat("d/m/Y",\date("d/m/Y"));
        $this->dateAdhesion=$dateActuelle;
        $this->dateAdhesion->modify("+1 Year");

    }
    public function adhesionValable():bool{
        $dateActuelle=\DateTime::createFromFormat("d/m/Y",\date("d/m/Y"));
        $interval=$dateActuelle->diff($this->dateAdhesion);
        if ($interval->y>=1 && $interval->d>=1){
            return false;
        }else{
            return true;
        }


    }

}