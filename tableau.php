<?php
// header
include("header.php");

// requete pour recuperer toutes les infos produits
$requete = "SELECT * FROM produits  
            ORDER BY pro_id asc";
$result = $db->query($requete);

// gestion de l'erreur 
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

<!-- titre de la page  -->  
<div class="row shadow mt-3 mb-3 mx-0 p-3  rounded bg-dark">
    <div class="col-2  text-white-50 text-right"></div>
    <div class="col-md-8 h2 text-white-50 text-center">Catalogue</div>
    <div class="col-md-2 text-center">
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

// on boucle sur chaque ligne renvoyée
        while ($row = $result->fetch(PDO::FETCH_OBJ))
        {
            $pathImg = 'public/images/' . $row->pro_id . '.' . $row->pro_photo;
            echo '<tr class="text-center">';
            echo '<td class="table-warning">';

            if (!file_exists($pathImg)) 
            {
                $pathImg = 'public/images/erreurImage.jpg';
            }

// affichage de chaque colonne avec sa valeur correspondante
            echo ' <img class="mx-auto d-block img-fluid" src ="' . $pathImg . ' " alt="' . $row->pro_libelle . ' " title=" ' . $row->pro_libelle . '"></td>';
            echo ' <td class ="align-middle" >' . $row->pro_id . '</td>';
            echo '<td class ="align-middle" >' . $row->pro_ref . '</td>';
            echo '<td class="table-warning align-middle"><u><a class=" text-danger" href="detail.php?id=' . $row->pro_id . '" title=' . $row->pro_libelle . '>' . $row->pro_libelle . '</a></u></td>';
            echo "<td class ='align-middle'>" . $row->pro_prix . "</td>";
            echo "<td class ='align-middle' >" . $row->pro_stock . "</td>";
            echo "<td class ='align-middle'  >" . $row->pro_couleur . "</td>";

// creation au format date avec la date recuperee du jour 
            $dateAjout = date_create($row->pro_d_ajout);

// affichage de la date au format jj/mm/aaaa
            echo "<td class ='align-middle'  >" . date_format($dateAjout, 'd/m/y') . "</td>";

// creation au format date avec la date modifie recuperee du jour si differente de null          
            $dateModif = "";
            if ($row->pro_d_modif != null) 
            {
                $dateModif = date_create($row->pro_d_modif);
                $dateModif = date_format($dateModif, 'd/m/y');
            }

// affichage de la date au format jj/mm/aaaa
            echo "<td class ='align-middle' >" . $dateModif . "</td>";

//affichage de la colonne bloque
            echo "<td class ='align-middle' >";
            if (($row->pro_bloque) == 1) 
            {
                echo  "<p class='bg-danger text-center text-white'>BLOQUE<p>";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>