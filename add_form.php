<!--header-->
<?php 
    include("header.php");
    // requete SQL

$requete = "SELECT cat_id, cat_nom  FROM categories"; 
$result = $db->query($requete);

if (!$result) {
  $tableauErreurs = $db->errorInfo();
  echo $tableauErreur[2];
  die("Erreur dans la requête");
}

if ($result->rowCount() == 0) {
//   Pas d'enregistrement
  die("La table est vide");
}
?>

    <div class="row mt-3 mb-1 mx-0">
        <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Nouveau produit</div>
    </div><br>
    <h1>Informations du produit</h1>
    <form action="public/php/add_script.php" method="POST" id= "verifajout" name="verifajout">
    <div class="form-group">
            <label for="extension">Extension Photo : </label>
            <input type="text" class="form-control" name="extension" id="extension" value="jpg" disabled>
        </div>
        <!-- <p  id="errorPhoto" class="text-danger""></p> -->    
        <div class="form-group"> 
            <label for="reference">Référence : </label>
            <input type="text" class="form-control" name=reference id="reference" placeholder= "Entrez la Référence">
        </div>
        <!-- <p  id="errorRef" class="text-danger"></p> -->
        <div class="form-group">
            <label for="categorie">Catégorie : </label>
            <select class="form-control" name="categorie" id="categorie">
                <option value=""></option>
                <?php
                    while ($categorie = $result->fetch(PDO::FETCH_OBJ))
                    {
                        echo '<option value="'.$categorie->cat_id.'">'.$categorie->cat_nom.'</option>';
                    }
                ?>
            </select>
        </div>
        <!-- <p  id="errorCat" class="text-danger""></p> -->
        <div class="form-group">
            <label for="libelle">Libellé : </label>
            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Entrez le Libellé">
        </div>
        <!-- <p  id="errorLibelle" class="text-danger""></p> -->
        <div class="form-group">
            <label for="description">Description : </label>
            <textarea class="form-control" name="description" id="description" placeholder="Entrez la Description"></textarea>
        </div>
        <!-- <p  id="errorDescription" class="text-danger""></p> -->
        <div class="form-group">
            <label for="prix">Prix : </label>
            <input type="text" class="form-control" name="prix" id="prix" placeholder="Entrez le Prix">
        </div>
        <!-- <p  id="errorDescription" class="text-danger""></p>'-->    
        <div class="form-group">
            <label for="stock">Stock : </label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="Entrez le Stock">
        </div>
        <!-- <p  id="errorStock" class="text-danger""></p>-->
        <div class="form-group">
            <label for="couleur">Couleur : </label>
            <input type="text" class="form-control" name="couleur" id="couleur" placeholder="Entrez la Couleur">
        </div>
        <!-- <p  id="errorCouleur" class="text-danger""></p>'; -->
        <div class="form-group">
        <p><label>Produit bloqué ? :</label></p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bloque" value ="1" id="oui">
            <label class="form-check-label" for="prodBloque">Oui</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bloque" value ="null" checked  id="non">
            <label class="form-check-label" for="non">Non</label>
        </div>
        </div>
        <!-- <p  id="errorbloque" class="text-danger""></p> -->
    <!-- bouttons -->
        <a href ="tableau.php" title="retour" role = "button" class="btn btn-dark active mt-3">Retour</a>
        <button type="submit" class="btn btn-warning mt-3">Envoyer</button>
        <button type="reset" title="sup" class="btn btn-danger mt-3">Effacer</button>
    </form>

<!--menu de navigation du pied de page-->
<?php 
    include("footer.php");
?>