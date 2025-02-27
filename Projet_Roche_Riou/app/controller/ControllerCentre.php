
<!-- ----- debut ControllerCentre -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerCentre : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des Centres
 public static function CentreReadAll() {
  $results = ModelCentre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewAll.php';
  if (DEBUG)
   echo ("ControllerCentre : CentreReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function CentreReadId($args) {
     if(DEBUG)echo ("controllerCentre:vinReadId:begin</br>");
  $results = ModelCentre::getAllId();
  
$target = $args['target'];
  if(DEBUG) echo("ControlerCentre:ReadId : target = $target</br>");
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewId.php';
  require ($vue);
 }

 // Affiche un Centre particulier (id)
 public static function CentreReadOne() {
  $Centre_id = $_GET['id'];
  $results = ModelCentre::getOne($Centre_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un Centre
 public static function CentreCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau Centre.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function CentreCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelCentre::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInserted.php';
  require ($vue);
 }
 
 public static function associationVaccin() {
  $results = ModelCentre::linkVaccinToCentre();
  include 'config.php';
  $vue = $root . '/app/view/centre/viewDistinctRegion.php';
  require ($vue);  
 }
 
 public static function CentreDistinctRegion(){
  $results = ModelCentre::getDistinctRegion();
   include 'config.php';
  $vue = $root . '/app/view/centre/viewDistinctRegion.php';
  require ($vue);  
 }
 public static function CentreRegionCentre(){
  $results = ModelCentre::getRegionCentre();
   include 'config.php';
  $vue = $root . '/app/view/centre/viewRegionCentre.php';
  require ($vue);  
 }
 public static function CentreDeleted() {
  // ajouter une validation des informations du formulaire
  $id = $_GET['id'];
  echo $id;
  $results = ModelCentre::delete($id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewDelete.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerCentre -->


