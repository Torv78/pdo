<?php include "headerbiblio.php"; 

?>
<div class="container mt-5">

    <h2 class='pt-3 text-center'>ajouter un genre</h2>
    <form action="valideajoutnationalite.php" method="post"
        class="col-md-6 offset-md-3 border border-danger p-3 rounded">
        <div class="form-group">
            <label for='libelle'> libellé </label>
            <input type="text" class='form-control' id='libelle' placehoder='saisir le libellé' name='libelle'>
        </div>
        <div class="row">
            <div class="col"><a href="listenationalite.php" class='btn btn-warning btn-block'> revenir a la liste </a>
            </div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'>enregistrer</button></div>
        </div>

    </form>
</div>

<?php include "footerbiblio.php"; 

?>