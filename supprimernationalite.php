<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$num=$GET['num'];

$req=$monPdo->prepare("delete from nationalite  where num = :num");
$req->bindparam(':num', $num); 
$nb=$req->execute();



if($nb==1)
{
    $_SESSION['message']=["success"=>"la nationalité a bien été supprimée"];

}else{
    $_SESSION['message']=["danger"=>"la nationalité n'a pas été supprimée"];
}
header('location:listenationalite.php');
exit();

?>


