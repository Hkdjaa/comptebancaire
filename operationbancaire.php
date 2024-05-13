<?php 
class OperationBancaire {
    private $id;
    private $type;
    private $montant;
    private $date;
    private $compte_source_id;
    private $compte_destination_id;

    public function __construct($type, $montant, $date, $compte_source_id, $compte_destination_id) {
        $this->type = $type;
        $this->montant = $montant;
        $this->date = $date;
        $this->compte_source_id = $compte_source_id;
        $this->compte_destination_id = $compte_destination_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCompteSourceId() {
        return $this->compte_source_id;
    }

    public function getCompteDestinationId() {
        return $this->compte_destination_id;
    }

    // Setters
    public function setType($type) {
        $this->type = $type;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setCompteSourceId($compte_source_id) {
        $this->compte_source_id = $compte_source_id;
    }

    public function setCompteDestinationId($compte_destination_id) {
        $this->compte_destination_id = $compte_destination_id;
    }
}

?>