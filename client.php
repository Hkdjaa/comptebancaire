<?php
class client {
    protected $nom_client;
    protected $Prenom_client;

  
    public function __construct($nom_client, $Prenom_client) {
        $this->nom_client = $nom_client;
        $this->Prenom_client = $Prenom_client;
    }


    public function getnom_client() {
        return $this->nom_client;
    }

    public function getPrenom_client() {
        return $this->Prenom_client;
    }
}