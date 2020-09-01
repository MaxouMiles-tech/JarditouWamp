<?php
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
$readOnly = "readonly";

echo'<div class="container-fluid">';
echo' <form action="#" method="POST" id= "form2" name="form2">';
echo '<div class="form-group"> 
      <label for="reference">Référence : </label>
      <input type="text"'.$readOnly.'  class="form-control" name="'.$reference .'" id="'.$reference.'" placeholder="'.$reference.'">
      </div>
      <p  id="errorRef" class="text-danger"></p>';
echo '<div class="form-group">
      <label for="categorie">Catégorie : </label>
      <input type="text" '.$readOnly.' class="form-control" name="'.$categorie.'" id="'.$categorie.'" placeholder="'.$categorie.'" >
      </div>
      <p  id="errorCat" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="libelle">Libellé : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$libelle.'" id="'.$libelle.'" placeholder="'.$libelle.'"  >
      </div>
      <p  id="errorLibelle" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="description">Description : </label>
      <textarea  '.$readOnly.' class="form-control" name="'.$description.'" id="'.$description.'" placeholder="'.$description.'"  ></textarea>
      </div>
      <p  id="errorDescription" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="prix">Prix : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$prix.'" id="'.$prix.'" placeholder="'.$prix.'"  >
      </div>
      <p  id="errorDescription" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="stock">Stock : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$stock.'" id="'.$stock.'" placeholder="'.$stock.'"  >
      </div>
      <p  id="errorStock" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="couleur">Couleur : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$couleur.'" id="'.$couleur.'" placeholder="'.$couleur.'"  >
      </div>
      <p  id="errorCouleur" class="text-danger""></p>';
      if ($bloque == 1)
      {
            $oui = $non; 
            $non = " "; 
      }
echo  '<div class="form-group">
      <p><label>Produit bloqué ? :</label></p>
      <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="'.$bloque.'" value ="1" id="oui" '.$oui.' >
            <label class="form-check-label" for="prodBlock">Oui</label>
      </div>
      <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="'.$bloque.'" value =""  id="non"'.$non.'>
            <label class="form-check-label" for="non">Non</label>
      </div>
      </div>
      <p  id="errorblock" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="dateAjout">Date d\'ajout : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$dateAjout.'" id="'.$dateAjout.'" placeholder="'.$dateAjout.'"  >
      </div>
      <p  id="errorDateAjout" class="text-danger""></p>';
echo '<div class="form-group">
      <label for="dateModif">Date de modification : </label>
      <input type="text"  '.$readOnly.' class="form-control" name="'.$dateModif.'" id="'.$dateModif.'" placeholder="'.$dateModif.'"  >
      </div>
      <p  id="errorDateModif" class="text-danger""></p>';
?>
