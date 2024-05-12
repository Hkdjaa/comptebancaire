<?php
class client {
    protected $id_client;
    protected $nom_client;
    protected $Prenom_client;

  
    public function __construct($ID_client,$nom_client, $Prenom_client) {
        $this->ID_client = $ID_client;
        $this->nom_client = $nom_client;
        $this->Prenom_client = $Prenom_client;
    }
    public function getID_client() {
        return $this->ID_client;
    }

    public function getnom_client() {
        return $this->nom_client;
    }

    public function getPrenom_client() {
        return $this->Prenom_client;
    }
}
