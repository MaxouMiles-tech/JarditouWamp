<!--header-->
<?php
include("header.php");
?>

<?php
// requete SQL
$pro_id = $_GET["id"];
$modif =$_GET["modif"];
$requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id WHERE pro_id=" . $pro_id;

$result = $db->query($requete);

if (!$result) {
  $tableauErreurs = $db->errorInfo();
  echo $tableauErreur[2];
  die("Erreur dans la requête");
}

if ($result->rowCount() == 0) {
  // Pas d'enregistrement
  die("La table est vide");
}

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);
?>

<!-- Formulaire  -->
<?php
// image
$pathImg = 'src ="public/images/' . $produit->pro_id . '.' . $produit->pro_photo . '"';
echo "<div'><img class='mx-auto d-block img-fluid w-25'" . $pathImg . " alt=" . $produit->pro_libelle . " title=" . $produit->pro_libelle . "></div>";
//  Formulaire


include("public/php/formulaire.php");
// bouttons
echo '<a href ="tableau.php" title="retour" role = "button" class="btn btn-dark active mt-3">Retour</a>
      <a href="detail.php?id='.$pro_id.'&modif=true" title ="modif" role="button" class="btn btn-warning mt-3">Modifier</a>
      <a href="#" title="sup" role="button" class="btn btn-danger mt-3">Supprimer</a>';
echo '</form>';
?>


<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>