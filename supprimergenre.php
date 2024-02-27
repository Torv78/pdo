<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$num=$GET['num'];

$req=$monPdo->prepare("delete from genre  where num = :num");
$req->bindparam(':num', $num); 
$nb=$req->execute();



if($nb==1)
{
    $_SESSION['message']=["success"=>"le genre a bien été supprimée"];

}else{
    $_SESSION['message']=["danger"=>"le genre n'a pas été supprimée"];
}
header('location:listegenre.php');
exit();

?>


