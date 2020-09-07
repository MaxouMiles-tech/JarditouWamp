<!--header-->
<?php
include("header.php");

// requete SQL
$pro_id = $_GET["id"];
$requete = "SELECT * FROM produits 
            INNER JOIN categories ON produits.pro_cat_id = categories.cat_id 
            WHERE pro_id=" . $pro_id;
$result = $db->query($requete);

if (!$result) {
  $tableauErreurs = $db->errorInfo();
  echo $tableauErreurs[2];
  die("Erreur dans la requête");
}

if ($result->rowCount() == 0) {
  // Pas d'enregistrement
  die("La table est vide");
}

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);

// image 
$pathImg = 'public/images/' . $produit->pro_id . '.' . $produit->pro_photo ;
if(!file_exists($pathImg) )
{
    $pathImg ='public/images/erreurImage.jpg';
}
echo "<div'><img class='mx-auto d-block img-fluid w-25' src =" . $pathImg . " alt=" . $produit->pro_libelle . " title=" . $produit->pro_libelle . "></div>";

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
      <input readonly type="text" class="form-control" placeholder="<?php echo $reference;?>">
    </div>
    <!-- <p  id="errorRef" class="text-danger"></p> -->
    <div class="form-group">
      <label for="categorie">Catégorie : </label>
      <input readonly type="text" class="form-control" placeholder="<?php echo $categorie;?>">
    </div>
    <!-- <p  id="errorCat" class="text-danger""></p> -->
    <div class="form-group">
      <label for="libelle">Libellé : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $libelle;?>">
      </div>
      <!-- <p  id="errorLibelle" class="text-danger""></p> -->
    <div class="form-group">
      <label for="description">Description : </label>
      <textarea readOnly class="form-control overflow-auto" placeholder="<?php echo $description;?>"></textarea>
    </div>
    <!-- <p  id="errorDescription" class="text-danger""></p> -->
    <div class="form-group">
      <label for="prix">Prix : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $prix;?>">
    </div>
    <!-- <p  id="errorDescription" class="text-danger""></p>'-->    
    <div class="form-group">
      <label for="stock">Stock : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $stock;?>"">
    </div>
    <!-- <p  id="errorStock" class="text-danger""></p>-->
    <div class="form-group">
      <label for="couleur">Couleur : </label>
      <input type="text"  readOnly class="form-control" placeholder="<?php echo $couleur;?>"">
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
      <input type="text" readOnly class="form-control" placeholder="<?php echo $dateAjout;?>"">
    </div>
    <!-- <p  id="errorDateAjout" class="text-danger""></p> -->
    <div class="form-group">
      <label for="dateModif">Date de modification : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $dateModif;?>"">
    </div>
    <!-- <p  id="errorDateModif" class="text-danger""></p> -->
<!-- bouttons -->

<script type="text/javascript" language="javascript">

function confirmation(id)
{
  if (confirm("Veuillez confirmer la supression de la fiche produit :  <?php echo $produit->pro_ref; ?>?")) {

    window.location.href="public/php/delete_script.php?id=" + id;
  }
  else {
    window.location.href="tableau.php";
  }

}
</script>

    <a href ="tableau.php" title="retour" role = "button" class="btn btn-dark active mt-3">Retour</a>
    <a <?php echo'href="formulaire_modif.php?id='.$pro_id.'"'?> role="button" class="btn btn-warning mt-3">Modifier</a>
    <a href=javascript:void(0) role="button" onclick ="confirmation(<?php echo $pro_id; ?>)" class="btn btn-danger mt-3">Supprimer</a>
    
  </form>




<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>

