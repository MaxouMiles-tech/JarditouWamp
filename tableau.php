<?php 
    include("header.php");
?>
<!-- Tableau -->
<?php
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT * FROM produits  ORDER BY pro_d_ajout DESC";

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

<div class="table-responsive">
    <table class="table table-bordered table-striped">
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
        echo"<tr>";
        echo "<td><img class='img-fluid'".$pathImg." alt=".$row->pro_libelle." title=".$row->pro_libelle."></td>";        
        echo"<td>".$row->pro_id."</td>";
        echo"<td>".$row->pro_ref."</td>";
        echo '<td><a href="detail.php?id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></td>';
        echo"<td>".$row->pro_prix."</td>";
        echo"<td>".$row->pro_stock."</td>";
        echo"<td>".$row->pro_couleur."</td>";
        $dateAjout = date_create($row->pro_d_ajout);
        echo"<td>".date_format($dateAjout, 'd/m/y')."</td>";
        $dateModif = ""; 
        if ($row->pro_d_modif !=null)
        {
            $dateModif = date_create($row->pro_d_modif);
            $dateModif =date_format($dateModif, 'd/m/y');
        }

        echo"<td>".$dateModif."</td>";
        echo"<td>";
        if(($row->pro_bloque) == 1)
        {
            echo "BLOQUE";
        }
        echo "</td>";
        echo"</tr>";
    }

    echo "</table>"; 
    

    ?>
</div>   





<!--menu de navigation du pied de page-->
<?php 
    include("footer.php");
?>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>