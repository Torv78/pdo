<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$action=$GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action=="modifier"){
$req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
$req->bindparam(':num', $num);
$req->bindparam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
$req->bindparam(':libelle',$libelle);
}
$nb=$req->execute();

$mmessage= $action == "modifier" ? "modifiée" : "ajoutée" ;

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';

if($nb==1)
{ echo'<div class="alert alert-dismissible alert-primary">
    la nationalité a bien été '. $mmessage .'
</div>';

}else{
    echo'<div class="alert alert-dismissible alert-primary">
    la nationalité n\'a pas  bien été '. $mmessage .'
</div>';
}?></div>
</div>
<a href="listenationalite.php" class="btn btn-danger"> revenir a la liste des nationalités</a>
</div>


<?php include "footerbiblio.php"; ?>