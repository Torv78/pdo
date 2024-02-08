<?php include "headerbiblio.php"; 
$action=$_GET['action'];

if($action=="modifier"){
    include "connexion-pdo.php";
$num=$_GET['num'];
$req=$monPdo->prepare("select*from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindparam(':num',$num);
$req->execute();
$lanationalite=$req->fetch();
}
?>
<div class="container mt-5">

    <h2 class='pt-3 text-center'> <?php echo $action ?> une nationalite</h2>
    <form action="valideformnationalite.php?action=<?php echo $action ?>" method="post"
        class="col-md-6 offset-md-3 border border-danger p-3 rounded">
        <div class="form-group">
            <label for='libelle'> libellé </label>
            <input type="text" class='form-control' id='libelle' placehoder='saisir le libellé' name='libelle' value ="<?php if($action=="modifier") {echo $lanationalite -> libelle ;} ?>">
        </div>
        <input type="hidden" id="num" name="num" value="<?php if($action=="modifier") {echo $lanationalite -> num ;} ?>">
        <div class="row">
            <div class="col"><a href="listenationalite.php" class='btn btn-warning btn-block'> revenir a la liste </a>
            </div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $action ?></button></div>
        </div>

    </form>
</div>

<?php include "footerbiblio.php"; 

?>