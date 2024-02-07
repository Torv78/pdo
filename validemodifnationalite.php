<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$num=$_POST['num'];
$libelle=$_POST['libelle'];

$req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num)");
$req->bindparam(':libelle',$libelle);
$nb=$req->execute();



echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';

if($nb==1)
{ echo'<div class="alert alert-dismissible alert-primary">
    la nationalité a bien été ajouter 
</div>';

}else{
    echo'<div class="alert alert-dismissible alert-primary">
    la nationalité n\'a pas  bien été ajouter 
</div>';
}?></div>
</div>
<a href="listenationalite.php" class="btn btn-danger"> revenir a la liste des nationalités</a>
</div>


<?php include "footerbiblio.php"; ?>