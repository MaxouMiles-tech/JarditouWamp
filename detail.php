<!--header-->
<?php
include("header.php");

// requete SQL
$pro_id = $_GET["id"];
$modif =$_GET["modif"];
$requete = "SELECT * FROM produits 
            INNER JOIN categories ON produits.pro_cat_id = categories.cat_id 
            WHERE pro_id=" . $pro_id;
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

// image
$pathImg = 'src ="public/images/' . $produit->pro_id . '.' . $produit->pro_photo . '"';
echo "<div'><img class='mx-auto d-block img-fluid w-25'" . $pathImg . " alt=" . $produit->pro_libelle . " title=" . $produit->pro_libelle . "></div>";
//  Formulaire

$reference = $produit->pro_ref;
$categorie =$produit->cat_nom;
$libelle =$produit->pro_libelle;
$description = $produit->pro_description;
$prix = $produit->pro_prix;
$stock = $produit->pro_stock ;
$couleur = $produit->pro_couleur ;
$bloque = $produit->pro_bloque;
$non = "checked";
$oui = "";
$dateAjout = $produit->pro_d_ajout;
$dateModif = $produit->pro_d_modif;
?>

<div class="container-fluid">
  <form action="#" method="POST" id= "form2" name="form2">
    <div class="form-group"> 
      <label for="reference">Référence : </label>
      <input readonly type="text"<?php echo'class="form-control" name="'.$reference .'" id="'.$reference.'" placeholder="'.$reference.'">';?>
    </div>
    <!-- <p  id="errorRef" class="text-danger"></p> -->
    <div class="form-group">
      <label for="categorie">Catégorie : </label>
      <input readonly type="text" <?php  echo' class="form-control" name="'.$categorie.'" id="'.$categorie.'" placeholder="'.$categorie.'">';?>
    </div>
    <!-- <p  id="errorCat" class="text-danger""></p> -->
    <div class="form-group">
      <label for="libelle">Libellé : </label>
      <input type="text" readOnly <?php echo'class="form-control" name="'.$libelle.'" id="'.$libelle.'" placeholder="'.$libelle.'">';?>
      </div>
      <!-- <p  id="errorLibelle" class="text-danger""></p> -->
    <div class="form-group">
      <label for="description">Description : </label>
      <textarea readOnly <?php echo'class="form-control" name="'.$description.'" id="'.$description.'" placeholder="'.$description.'"></textarea>';?> 
    </div>
    <!-- <p  id="errorDescription" class="text-danger""></p> -->
    <div class="form-group">
      <label for="prix">Prix : </label>
      <input type="text" readOnly <?php echo'class="form-control" name="'.$prix.'" id="'.$prix.'" placeholder="'.$prix.'">';?>
    </div>
    <!-- <p  id="errorDescription" class="text-danger""></p>'-->    
    <div class="form-group">
      <label for="stock">Stock : </label>
      <input type="text" readOnly <?php echo'class="form-control" name="'.$stock.'" id="'.$stock.'" placeholder="'.$stock.'" >';?>
    </div>
    <!-- <p  id="errorStock" class="text-danger""></p>-->
    <div class="form-group">
      <label for="couleur">Couleur : </label>
      <input type="text"  readOnly <?php echo'class="form-control" name="'.$couleur.'" id="'.$couleur.'" placeholder="'.$couleur.'">';?>
    </div>
    <!-- <p  id="errorCouleur" class="text-danger""></p>'; -->
    <?php  if ($bloque == 1)
      {
            $oui = $non; 
            $non = " "; 
      } ?>
    <div class="form-group">
      <p><label>Produit bloqué ? :</label></p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bloque" value ="1" id="oui" <?php echo $oui; ?> disabled >
        <label class="form-check-label" for="prodBloque">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bloque" value =""  id="non" <?php echo $non; ?> disabled>
        <label class="form-check-label" for="non">Non</label>
      </div>
    </div>
    <!-- <p  id="errorbloque" class="text-danger""></p> -->
    <div class="form-group">
      <label for="dateAjout">Date d'ajout : </label>
      <input type="text" readOnly <?php echo 'class="form-control" name="'.$dateAjout.'" id="'.$dateAjout.'" placeholder="'.$dateAjout.'">';?>
    </div>
    <!-- <p  id="errorDateAjout" class="text-danger""></p> -->
    <div class="form-group">
      <label for="dateModif">Date de modification : </label>
      <input type="text" readOnly <?php echo 'class="form-control" name="'.$dateModif.'" id="'.$dateModif.'" placeholder="'.$dateModif.'">';?>
    </div>
    <!-- <p  id="errorDateModif" class="text-danger""></p> -->
<!-- bouttons -->
    <a href ="tableau.php" title="retour" role = "button" class="btn btn-dark active mt-3">Retour</a>
    <a <?php echo'href="#='.$pro_id ?> title ="modif" role="button" class="btn btn-warning mt-3">Modifier</a>
    <a href="#" title="sup" role="button" class="btn btn-danger mt-3">Supprimer</a>
  </form>


<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>