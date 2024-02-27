
<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$req=$monPdo->prepare("select*from genre");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesgenres=$req->fetchAll();

if(!empty($_SESSION['message'])){
  $mesmessages=$_SESSION['message'];
  foreach($mesmessages as $key=>$message){
    echo'<div class="container pt-10">
      <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
    
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
       </button>
       </div>
  </div> ';
  }
  $_SESSION['message']=[];
}
?>


<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"></div>
        <h2>LISTE DE GENRE</h2>
        <div class="col-3"><a href="formgenre.php?action=ajouter" class='btn btn-sucess'><i
                    class="fas fa-plus-circle"></i>créer un genre </a> </div>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">Numero</th>
                <th scope="col" class="col-md-8">libellé</th>
                <th scope="col" class="col-md-2">action</th>

            </tr>
        </thead>
        <tbody>
            <?php
    foreach($lesgenres as $genre)
    {
     echo "<tr>";
     echo "<td>$genre->num</td>";
     echo "<td>$genre->libnation</td>";
     echo "<td>
          <a href='formgenre.php?action=modifier&num=$genre->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
          <a href='#modalsuppression' data-suppression='supprimergenre.php?num=$genre->num' data-toggle='modal' data-message='voulez vous supprimer ce genre' class='btn btn-danger'><i class='fa fa-trash'></i></a>
     
     </td>";
     echo "</tr>";
    }
    ?>



        </tbody>
    </table>


</div>
<div id="modalsuppression" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ne pas supprimer</button>
        <a href="" type="button" class="btn btn-primary" id="btnsupp">supprimer</a>
      </div>
    </div>
  </div>
</div>
<?php include "footerbiblio.php"; ?>