<?php
class RetourController{

    private $Connecteur;
    private $Connection;

    public function __construct() {
		require_once  __DIR__ . "/../core/Connecteur.php";
        require_once  __DIR__ . "/../model/retour.php";
        
        $this->Connecteur=new Connecteur();
        $this->Connection=$this->Connecteur->Connection();

    }

   /**
    * Ejecuta la acción correspondiente.
    *
    */
    public function run($action){
        switch($action)
        { 
            case "index" :
                $this->index();
                break;
            case "ajout" :
                $this->creation();
                break;
            case "details" :
                $this->details();
                break;
            case "modifier" :
                $this->modifier();
                break;
            default:
                $this->index();
                break;
        }
    }
    
   /**
    * Loads the retours home page with the list of
    * retours getting from the model.
    *
    */ 
    public function index(){
        
        //We create the retour object
        $retour=new Retour($this->Connection);
        
        //We get all the retours
        $retour=$retour->getAll();
       
        //We load the index view and pass values to it
        $this->view("retour",array(
            "retour"=>$retour,
            "titulo" => "PHP MVC"
        ));
    }

    /**
    * Loads the retours home page with the list of
     * retours getting from the model.
    *
    */ 
    public function details(){
        
        //We load the model
        $modelo = new retour($this->Connection);
        //We recover the retour from the BBDD
        $retour = $modelo->getById($_GET["id"]);
        //We load the detail view and pass values to it
        $this->view("details",array(
            "retour"=>$retour,
            "titulo" => "details retour"
        ));
    }
    
   /**
    * Create a new retour from the POST parameters
     * and reload the index.php.
    *
    */
    public function creation(){
        if(isset($_POST["nom_article"])){
            
            //Creamos un usuario
            $retour=new Retour($this->Connection);
            $retour->setDate_achat($_POST["date_achat"]);
            $retour->setDate_retour($_POST["date_retour"]);
            $retour->setStatut($_POST["statut"]);
            $retour->setNom_article($_POST["nom_article"]);
            $retour->setMotif_retour($_POST["motif_retour"]);
            $retour->setMontant_article($_POST["montant_article"]);
            $retour->setId_client($_POST["id_client"]);
            $retour->setId_enseigne($_POST["id_enseigne"]);
            $save=$retour->save();
        }
        header('Location: index.php');
    }

   /**
    * Update retour from POST parameters
     * and reload the index.php.
    *
    */
    public function modifier(){
        if(isset($_POST["id"])){
            
            //We create a user
            $retour=new Retour($this->Connection);
            $retour->setDate_achat($_POST["date_achat"]);
            $retour->setDate_retour($_POST["date_retour"]);
            $retour->setStatut($_POST["statut"]);
            $retour->setNom_article($_POST["nom_article"]);
            $retour->setMotif_retour($_POST["motif_retour"]);
            $retour->setMontant_article($_POST["montant_article"]);
            $retour->setId_client($_POST["id_client"]);
            $retour->setId_enseigne($_POST["id_enseigne"]);
            $save=$retour->update();
        }
        header('Location: index.php');
    }
    
    
   /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($vista,$data){
        $data = $data;  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }

}
?>