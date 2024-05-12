comptebancaire.php
<?php
class comptebancaire {
    protected $id;
    protected $numero_compte;

  
    public function __construct($id, $numero_compte) {
        $this->id = $id;
        $this->numero_compte = $numero_compte;
    }


    public function getid() {
        return $this->id;
    }


    public function setid($id) {
        $this->id = $id;
    }


    public function getnumero_compte() {
        return $this->numero_compte;
    }
}
