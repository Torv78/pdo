<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$action=$GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action=="modifier"){
$req=$monPdo->prepare("update genre set libelle = :libelle where num = :num");
$req->bindparam(':num', $num); 
$req->bindparam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into genre(libelle) values(:libelle)");
    $req->bindparam(':libelle',$libelle);
}
$nb=$req->execute();

$message= $action == "modifier" ? "modifiée" : "ajoutée" ;

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';

if($nb==1)
{ echo'<div class="alert alert-dismissible alert-primary">
    le genre a bien été '. $message .'
</div>';

}else{
    echo'<div class="alert alert-dismissible alert-primary">
    le genre n\'a pas  bien été '. $message .'
</div>';
}?></div>
</div>
<a href="listegenre.php" class="btn btn-danger"> revenir a la liste des genres</a>
</div>


<?php include "footerbiblio.php"; ?>