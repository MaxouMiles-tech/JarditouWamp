<!--header-->
<?php
include("header.php");
?>

<?php
// requete SQL
$pro_id = $_GET["id"];
$requete = "SELECT * FROM produits WHERE pro_id=" . $pro_id;

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
        $pathImg = 'src ="public/images/'.$produit->pro_id.'.'.$produit->pro_photo.'"';
        echo "<div'><img class='mx-auto d-block img-fluid w-25'".$pathImg." alt=".$produit->pro_libelle." title=".$produit->pro_libelle."></div>";        
     //  Formulaire
    
  
  
  ?>


<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>