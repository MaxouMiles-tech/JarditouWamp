<?php
// header
include("header.php");

//recuperation de l'id passe en parametre dans l'url
$pro_id = $_GET["id"];

// requete pour recuperer toutes les infos produits
$requete = "SELECT * FROM produits 
            INNER JOIN categories ON produits.pro_cat_id = categories.cat_id 
            WHERE pro_id=" . $pro_id;
$result = $db->query($requete);

// gestion de l'erreur 
if (!$result) 
{
  $tableauErreurs = $db->errorInfo();
  echo $tableauErreurs[2];
  die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
// Pas d'enregistrement
  die("La table est vide");
}

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);

// declaration de variable recuperer sur la base de donnee
$reference = $produit->pro_ref;
$categorie = $produit->cat_nom;
$libelle = $produit->pro_libelle;
$description = $produit->pro_description;
$prix = $produit->pro_prix;
$stock = $produit->pro_stock;
$couleur = $produit->pro_couleur;
$dateAjout = $produit->pro_d_ajout;
$dateModif = $produit->pro_d_modif;
$bloque = $produit->pro_bloque;
?>

<!-- formulaire d'affichage des details produits : pas de possibilite d'ecriture-->
<div class="container-fluid">

<!-- titre de la page  -->  
  <div class="row mt-3 mb-1">
        <div class="col h2 rounded bg-dark text-white-50 p-3 text-center"><?php echo $libelle; ?></div>
  </div><br>
  
  <?php
// gestion de l'image
// chemin 
  $pathImg = 'public/images/' . $produit->pro_id . '.' . $produit->pro_photo;

// si l'image n'est pas charger: image par defaut
  if (!file_exists($pathImg)) 
  {
    $pathImg = 'public/images/erreurImage.jpg';
  }

// afichage de l'image 
  echo "<div'><img class='mx-auto d-block img-fluid w-25' src =" . $pathImg . " alt=" . $produit->pro_libelle . " title=" . $produit->pro_libelle . "></div>";
?>

<!-- pas de redirection dans action car formulaire d'affichage seulement  -->
  <form action="#" method="POST" id="formdetail" name="formdetail">

    <div class="form-group">
      <label for="reference">Référence : </label>
      <input readonly type="text" class="form-control" placeholder="<?php echo $reference; ?>">
    </div>

    <div class="form-group">
      <label for="categorie">Catégorie : </label>
      <input readonly type="text" class="form-control" placeholder="<?php echo $categorie; ?>">
    </div>

    <div class="form-group">
      <label for="libelle">Libellé : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $libelle; ?>">
    </div>

    <div class="form-group">
      <label for="description">Description : </label>
      <textarea readOnly class="form-control overflow-auto" placeholder="<?php echo $description; ?>"></textarea>
    </div>

    <div class="form-group">
      <label for="prix">Prix : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $prix; ?>">
    </div>

    <div class="form-group">
      <label for="stock">Stock : </label>
      <input type="number" readOnly class="form-control" placeholder="<?php echo $stock; ?>"">
    </div>

    <div class=" form-group">
      <label for="couleur">Couleur : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $couleur; ?>"">
    </div>


    <?php 
// declaration de variable necessaire a gerer si les boutons radios sont coche

    $non = "checked";
    $oui = "";

//on recupere la valeur $bloque de la base de donnee sous forme null ou 1
// on teste pour inverser et convertir la valeur en check
    if ($bloque == 1) 
    {
      $oui = $non;
      $non = " ";
    }
    ?>

    <div class=" form-group">
      <p><label>Produit bloqué ? :</label></p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bloque" value="1" id="oui" <?php echo $oui; ?> disabled>
        <label class="form-check-label" for="prodBloque">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bloque" value="" id="non" <?php echo $non; ?> disabled>
        <label class="form-check-label" for="non">Non</label>
      </div>
    </div>

    <div class="form-group">
      <label for="dateAjout">Date d'ajout : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $dateAjout; ?>"">
    </div>

    <div class=" form-group">
      <label for="dateModif">Date de modification : </label>
      <input type="text" readOnly class="form-control" placeholder="<?php echo $dateModif; ?>"">
    </div>
   
<!-- bouttons -->
    <a href="tableau.php" title="retour" role="button" class="btn btn-dark active mt-3">Retour</a>
    <a <?php echo 'href="formulaire_modif.php?id=' . $pro_id . '"' ?> role="button" class="btn btn-warning mt-3">Modifier</a>
    <a href=javascript:void(0) role="button" onclick="confirmation(<?php echo $pro_id; ?>)" class="btn btn-danger mt-3">Supprimer</a>
  </form>

<!-- script js pour la confirmation de suppression en alert avec redirection vers les bonnes pages-->
    <script type=" text/javascript" language="javascript">
      function confirmation(id)
      {
        if (confirm("Veuillez confirmer la supression de la fiche produit : <?php echo $produit->pro_ref; ?>?")) 
        {
          window.location.href="public/php/delete_script.php?id=" + id;
        }
        else
        {
          window.location.href="tableau.php";
        }
      }
      </script>

  <!--menu de navigation du pied de page-->
  <?php
  include("footer.php");
  ?>