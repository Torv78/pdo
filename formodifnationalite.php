<?php include "headerbiblio.php"; 

include "connexion-pdo.php";
$req=$monPdo->prepare("select*from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesnationalites=$req->fetchAll();
$num=$_GET['num']
?>
<div class="container mt-5">

    <h2 class='pt-3 text-center'>modifier une nationalite</h2>
    <form action="validemodifnationalite.php" method="post"
        class="col-md-6 offset-md-3 border border-danger p-3 rounded">
        <div class="form-group">
            <label for='libelle'> libellé </label>
            <input type="text" class='form-control' id='libelle' placehoder='saisir le libellé' name='libelle'>
        </div>
        <input type="hiden" id="num" name="num">
        <div class="row">
            <div class="col"><a href="listenationalite.php" class='btn btn-warning btn-block'> revenir a la liste </a>
            </div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'>modifier</button></div>
        </div>

    </form>
</div>

<?php include "footerbiblio.php"; 

?>