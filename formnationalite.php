<?php include "headerbiblio.php"; 
$action=$_GET['action'];

include "connexion-pdo.php";
if($action=="modifier"){
    
$num=$_GET['num'];
$req=$monPdo->prepare("select * from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindparam(':num', $num);
$req->execute();
$lanationalite=$req->fetch();

}
$reqcontinent=$monPdo->prepare("select * from continent ");
$reqcontinent->setFetchMode(PDO::FETCH_OBJ);
$reqcontinent->execute();
$lescontinents=$reqcontinent->fetchall();
?>
<div class="container mt-5">

    <h2 class='pt-3 text-center'> <?php echo $action ?> une nationalite</h2>
    <form action="valideformnationalite.php?action=<?php echo $action ?>" method="post"
        class="col-md-6 offset-md-3 border border-danger p-3 rounded">
        <div class="form-group">
            <label for='libelle'> libellé </label>
            <input type="text" class='form-control' id='libelle' placehoder='saisir le libelle' name='libelle' value ="<?php if($action=="modifier") {echo $lanationalite -> libelle ;} ?>">
        </div>
        <div class="form-group">
            <label for='continent'> libellé </label>
            <select name="continent">
                <?php
                foreach($lescontinents as $continent){
                   echo" <option value='$continent->num'>$continent->libelle></option>";
                }
                
                ?>
            </select>
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