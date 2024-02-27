<?php include "headerbiblio.php"; 
$action=$_GET['action'];

if($action=="modifier"){
    include "connexion-pdo.php";
$num=$_GET['num'];
$req=$monPdo->prepare("select * from genre where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindparam(':num', $num);
$req->execute();
$legenre=$req->fetch();
}
?>
<div class="container mt-5">

    <h2 class='pt-3 text-center'> <?php echo $action ?> un genre</h2>
    <form action="valideformgenre.php?action=<?php echo $action ?>" method="post"
        class="col-md-6 offset-md-3 border border-danger p-3 rounded">
        <div class="form-group">
            <label for='libelle'> libellé </label>
            <input type="text" class='form-control' id='libelle' placehoder='saisir le libellé' name='libelle' value ="<?php if($action=="modifier") {echo $legenre -> libelle ;} ?>">
        </div>
        <input type="hidden" id="num" name="num" value="<?php if($action=="modifier") {echo $legenre -> num ;} ?>">
        <div class="row">
            <div class="col"><a href="listegenre.php" class='btn btn-warning btn-block'> revenir a la liste </a>
            </div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $action ?></button></div>
        </div>

    </form>
</div>

<?php include "footerbiblio.php"; 

?>