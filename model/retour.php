<?php
class Retour {
    private $table = "retour";
    private $Connection;

    private $id;
    private $date_achat;
    private $date_retour;
    private $statut;
    private $nom_article;
    private $motif_retour;
    private $montant_article;
    private $id_client;
    private $id_enseigne;
    public function __construct($Connection) {
		$this->Connection = $Connection;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDate_achat() {
        return $this->date_achat;
    }

    public function setDate_achat($date_achat) {
        $this->date_achat = $date_achat;
    }

    public function getDate_retour() {
        return $this->date_retour;
    }

    public function setDate_retour($date_retour) {
        $this->date_retour = $date_retour;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function getNom_article() {
        return $this->nom_article;
    }

    public function setNom_article($nom_article) {
        $this->nom_article = $nom_article;
    }

    public function getMontant_article() {
        return $this->montant_article;
    }

    public function setMontant_article($montant_article) {
        $this->montant_article = $montant_article;
    }
    public function getId_client() {
        return $this->id_client;
    }

    public function setId_client($id_client) {
        $this->id_client = $id_client;
    }
    public function getId_enseigne() {
        return $this->id_enseigne;
    }

    public function setId_enseigne($id_enseigne) {
        $this->id_enseigne = $id_enseigne;
    }
    
    public function getMotif_retour() {
        return $this->motif_retour;
    }

    public function setMotif_retour($motif_retour) {
        $this->motif_retour = $motif_retour;
    } 
    
    public function save(){
        $sql ="INSERT INTO " . $this->table . " 
        (date_achat, date_retour, statut, nom_article, motif_retour, montant_article, id_client, id_enseigne)
        VALUES (?,?,?,?,?,?,?,?)";

        $result = $this->Connection->prepare($sql)->execute([$this->date_achat, $this->date_retour, $this->statut, $this->nom_article, $this->motif_retour, $this->montant_article, $this->id_client, $this->id_enseigne]);

        $this->Connection = null;

        return $result;
    }

    public function update(){

        $consultation = $this->Connection->prepare("
            UPDATE " . $this->table . " 
            SET 
                date_achat = :date_achat,
                date_retour = :date_retour,
                statut = :statut,
                nom_article = :nom_article,
                motif_retour = :motif_retour,
                montant_article = :montant_article,
                id_client = :id_client,
                id_enseigne = :id_enseigne
            WHERE id = :id 
        ");

        $resultado = $consultation->execute(array(
            "date_achat" => $this->date_achat,
            "date_retour" => $this->date_retour,
            "statut" => $this->statut,
            "nom_article" => $this->nom_article,
            "motif_retour" => $this->motif_retour,
            "montant_article" => $this->montant_article,
            "id_client" => $this->id_client,
            "id_enseigne" => $this->id_enseigne
            
        ));
        $this->Connection = null;

        return $resultado;
    }
        
    
    public function getAll(){

        $consultation = $this->Connection->prepare("SELECT * FROM " . $this->table);
        $consultation->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //cierre de conexión
        return $resultados;

    }
    
    
    public function getById($id){
        $consultation = $this->Connection->prepare("SELECT id,date_achat, date_retour, statut, nom_article, motif_retour, montant_article, id_client, id_enseigne
                                                FROM " . $this->table . "  WHERE id = :id");
        $consultation->execute(array(
            "id" => $id
        ));
        /*Fetch all of the remaining rows in the result set*/
        $resultado = $consultation->fetchObject();
        $this->Connection = null; //connection closure
        return $resultado;
    }
    
    public function getBy($column,$value){
        $consultation = $this->Connection->prepare("SELECT id,date_achat, date_retour, statut, nom_article, motif_retour, montant_article, id_client, id_enseigne
                                                FROM " . $this->table . " WHERE :column = :value");
        $consultation->execute(array(
            "column" => $column,
            "value" => $value
        ));
        $resultados = $consultation->fetchAll();
        $this->Connection = null; //connection closure
        return $resultados;
    }
    
    public function deleteById($id){
        try {
            $consultation = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $consultation->execute(array(
                "id" => $id
            ));
            $Connection = null;
        } catch (Exception $e) {
            echo 'Failed DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteBy($column,$value){
        try {
            $consultation = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE :column = :value");
            $consultation->execute(array(
                "column" => $value,
                "value" => $value,
            ));
            $Connection = null;
        } catch (Exception $e) {
            echo 'Failed DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }
    
}
?>