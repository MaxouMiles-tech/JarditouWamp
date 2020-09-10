<?php
// header
include("header.php");
?>

<!-- titre de la page  -->  
<div class="row mt-3 mb-1 mx-0">
    <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Nouveau produit</div>
</div>
<h1>Informations du produit</h1><hr>
<p class="mt-4">* Ces zones sont obligatoires</p>

<!-- formulaire d'ajout d'un produit -->
<!-- debut du formulaire : redirection vers le script php -->
<!-- utilisation de enctype pour le chargement de l'image  -->
<form action="public/php/add_script.php " method="POST" enctype="multipart/form-data" id="verifadd" name="verifadd">
    <div class="form-group">
        <label for="reference">Référence* : </label>
        <input type="text" required class="form-control" name=reference id="reference" placeholder="Entrez la Référence">
    </div>
<!-- balise paragraphe pour l'affichage d'erreur js -->
    <p id="errorRef" class="text-danger"></p>

    <div class="form-group">
        <?php
//requete pour recuperer les id et les noms des categories
        $requete = "SELECT cat_id, cat_nom  FROM categories";
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
//   Pas d'enregistrement
            die("La table est vide");
        }
        ?>

        <label for="categorie">Catégorie* : </label>
        <select class="form-control" required name="categorie" id="categorie">
            <option value=""></option>
            <?php
// liste deroulante pour afficher les categories existantes
            while ($categorie = $result->fetch(PDO::FETCH_OBJ)) 
            {
                echo '<option value="' . $categorie->cat_id . '">' . $categorie->cat_nom . '</option>';
            }
            ?>
        </select>
    </div>
    <p id="errorCat" class="text-danger""></p>

    <div class=" form-group">
    <label for="libelle">Libellé* : </label>
    <input type="text" class="form-control" name="libelle" id="libelle" required placeholder="Entrez le Libellé">
    </div>
    <p id="errorLibelle" class="text-danger"></p>

    <div class="form-group">
        <label for="description">Description : </label>
        <textarea class="form-control overflow-auto" name="description" id="description" placeholder="Entrez la Description"></textarea>
    </div>

    <div class="form-group">
        <label for="prix">Prix* : </label>
        <input type="number" class="form-control" required name="prix" id="prix" placeholder="Entrez le Prix">
    </div>
    <p id="errorPrix" class="text-danger"></p>

    <div class="form-group">
        <label for="stock">Stock : </label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="Entrez le Stock">
    </div>

    <div class="form-group">
        <label for="couleur">Couleur : </label>
        <input type="text" class="form-control" name="couleur" id="couleur" placeholder="Entrez la Couleur">
    </div>

    <div class="form-group">
        <label>Produit bloqué ? :</label></br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bloque" value="1" id="oui">
            <label class="form-check-label" for="prodBloque">Oui</label>
            <input class="form-check-input ml-3" type="radio" name="bloque" value="null" checked id="non">
            <label class="form-check-label" for="non">Non</label>
        </div>
    </div>

    <div class="form-group">
        <label for="photo">Photo du produit :</label></br>
        <input type="file" name="photo"><br />
    </div>

<!-- bouttons -->
    <a href="tableau.php" title="retour" role="button" class="btn btn-dark active mt-3">Retour</a>
    <button type="submit" class="btn btn-warning mt-3">Envoyer</button>
    <button type="reset" title="sup" class="btn btn-danger mt-3">Effacer</button>
</form>

<!-- script js -->
<script src="public/js/JarditouAdd.js"></script>

<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>