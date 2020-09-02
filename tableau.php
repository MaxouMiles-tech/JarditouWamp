<!--header-->
<?php 
    include("header.php");
?>

<?php
// requete SQL
    $requete = "SELECT * FROM produits  ORDER BY pro_id asc";

    $result = $db->query($requete);

    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
       // Pas d'enregistrement
       die("La table est vide");
    }
?>
    <div class="row shadow mt-3 mb-3 mx-0 p-3  rounded bg-dark">
    <div class="col-2  text-white-50 text-right"></div>
    <div class="col-8 h2 text-white-50 text-center">Catalogue</div>
    <div class="col-2 text-center">
        <a class="text-white-50 nav-link" href="add_form.php">Ajouter un produit</a>
    </div>
    </div>

<!-- tableau -->
<div class="table-responsive">

    <table class="table  class='text-center table-bordered table-striped">
        <thead class="thead-light">
            <tr class="h2">
                <th class="w-25">Photo</th>
                <th>ID</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Couleur</th>
                <th>Ajout</th>
                <th>Modif</th>
                <th>Bloqué</th>
            </tr>
        </thead>
     
<?php
    while ($row = $result->fetch(PDO::FETCH_OBJ))
    {
        $pathImg = 'src ="public/images/'.$row->pro_id.'.'.$row->pro_photo.'"';
        echo"<tr class='text-center'>";
        echo "<td class='table-warning'><img class='img-fluid'".$pathImg." alt=".$row->pro_libelle." title=".$row->pro_libelle."></td>";        
        echo"<td class ='align-middle' >".$row->pro_id."</td>";
        echo"<td class ='align-middle' >".$row->pro_ref."</td>";
        echo '<td class="table-warning align-middle"><u><a class=" text-danger" href="detail.php?id='.$row->pro_id.'&modif=false" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></u></td>';
        echo"<td class ='align-middle'>".$row->pro_prix."</td>";
        echo"<td class ='align-middle' >".$row->pro_stock."</td>";
        echo"<td class ='align-middle'  >".$row->pro_couleur."</td>";
        $dateAjout = date_create($row->pro_d_ajout);
        echo"<td class ='align-middle'  >".date_format($dateAjout, 'd/m/y')."</td>";
        $dateModif = ""; 
        if ($row->pro_d_modif !=null)
        {
            $dateModif = date_create($row->pro_d_modif);
            $dateModif =date_format($dateModif, 'd/m/y');
        }

        echo"<td class ='align-middle' >".$dateModif."</td>";
        echo"<td class ='align-middle' >";
        if(($row->pro_bloque) == 1)
        {
            echo  "<p class='bg-danger text-center text-white'>BLOQUE<p>";
        }
        echo "</td>";
        echo"</tr>";
    }

    echo "</table>"; 
    ?>                   

<!--menu de navigation du pied de page-->
<?php 
    include("footer.php");
?>