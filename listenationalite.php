<?php include "headerbiblio.php"; 
include "connexion-pdo.php";
$req=$monPdo->prepare("select*from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesnationalites=$req->fetchAll();
?>


<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"></div>
        <h2>LISTE DE nationalite</h2>
        <div class="col-3"><a href="formajoutnationalite.php" class='btn btn-sucess'><i
                    class="fas fa-plus-circle"></i>créer une nationalité </a> </div>

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
    foreach($lesnationalites as $nationalite)
    {
     echo "<tr>";
     echo "<td>$nationalite->num</td>";
     echo "<td>$nationalite->libelle</td>";
     echo "<td>
          <a href='formodifnationalite.php?num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
          <a href='' class='btn btn-danger'><i class='fa fa-trash'></i></a>
     
     </td>";
     echo "</tr>";
    }
    ?>



        </tbody>
    </table>


</div>


<?php include "footerbiblio.php"; ?>