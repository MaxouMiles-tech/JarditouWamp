<!--header-->
<?php
include("header.php");

// requete SQL
$pro_id = $_GET["id"];

$requete = 'SELECT * FROM produits 
INNER JOIN categories ON produits.pro_cat_id = categories.cat_id
WHERE pro_id=' . $pro_id;


$result = $db->query($requete);

if (!$result) {
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreurs[2];
    die("Erreur dans la requête");
}
// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);
$id = $produit->pro_id;
$extension = $produit->pro_photo;
$reference = $produit->pro_ref;
$categorie = $produit->cat_nom;
$libelle = $produit->pro_libelle;
$description = $produit->pro_description;
$prix = $produit->pro_prix;
$stock = $produit->pro_stock;
$couleur = $produit->pro_couleur;
$bloque = $produit->pro_bloque;
$non = "checked";
$oui = "";
$dateAjout = $produit->pro_d_ajout;
$dateModif = $produit->pro_d_modif;
?>
 
<div class="container-fluid">
    <div class="row mt-3 mb-1">
        <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Modifier le produit</div>
    </div><br>
    <h1>Informations du produit</h1>
    <form action="public/php/update_script.php" enctype="multipart/form-data" method="POST" id="verifmodif" name="verifmodif">
        <?php
        // image 
        $pathImg = 'public/images/' . $id . '.' . $extension;
        if (!file_exists($pathImg)) {
            $pathImg = 'public/images/erreurImage.jpg';
        }
        echo "<div'><img class='mx-auto d-block img-fluid w-25' src =" . $pathImg . " alt=" . $libelle . " title=" . $libelle . "></div>";
        ?>

        <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" id="id">
        <input type="hidden" class="form-control" value="<?php echo $extension; ?>" name="extension" id="extension">
        <div class="form-group">
            <label for="reference">Référence* : </label>
            <input type="text" class="form-control" required name=reference id="reference" value="<?php echo $reference; ?>">
        </div>
        <p  id="errorRef" class="text-danger"></p>
        <div class="form-group">
            <?php
            $requete = 'SELECT * FROM categories';
            $result = $db->query($requete);
            if (!$result) {
                $tableauErreurs = $db->errorInfo();
                echo $tableauErreurs[2];
                die("Erreur dans la requête");
            }
            ?>
            <label for="categorie">Catégorie* : </label>
            <select class="form-control" required name="categorie" id="categorie">
                <?php
                while ($cat = $result->fetch(PDO::FETCH_OBJ)) {
                    $selected = "";
                    if ($categorie == $cat->cat_nom) {
                        $selected = "selected";
                    }
                    echo '<option value="' . $cat->cat_id . '" ' . $selected . '>' . $cat->cat_nom . '</option>';
                }
                ?>
            </select>
        </div>
        <p  id="errorCat" class="text-danger""></p>
        <div class="form-group">
            <label for="libelle">Libellé* : </label>
            <input type="text" class="form-control" required name="libelle" id="libelle" value="<?php echo $libelle; ?>">
        </div>
        <p  id="errorLibelle" class="text-danger""></p>
        <div class="form-group">
            <label for="description">Description : </label>
            <textarea class="form-control  overflow-auto " name="description" id="description"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix* : </label>
            <input type="text" class="form-control" name="prix" id="prix" value="<?php echo $prix; ?>">
        </div>
        <p  id="errorPrix" class="text-danger""></p>
        <div class="form-group">
            <label for="stock">Stock : </label>
            <input type="text" required class="form-control" name="stock" id="stock" value="<?php echo $stock; ?>">
        </div>
        <div class="form-group">
            <label for="couleur">Couleur : </label>
            <input type="text" class="form-control" name="couleur" id="couleur" value="<?php echo $couleur; ?>">
        </div>
        <?php if ($bloque == 1) {
            $oui = $non;
            $non = " ";
        } ?>
        <div class="form-group">
            <p><label>Produit bloqué ? :</label></p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bloque" value="1" id="oui" <?php echo $oui; ?>>
                <label class="form-check-label" for="prodBloque">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bloque" value="null" id="non" <?php echo $non; ?>>
                <label class="form-check-label" for="non">Non</label>
            </div>
        </div>
        <div class="form-group">
            <label  for="photo">Télécharger la photo du produit :</label></br> 
            <input  type="file"  name="photo"></br>
        </div>
        <!-- bouttons -->
        <a <?php echo 'href="detail.php?id=' . $pro_id . '"' ?> title="retour" role="button" class="btn btn-dark active mt-3">Retour</a>
        <button type="submit" class="btn btn-warning mt-3">Envoyer</button>
        <button type="reset" title="sup" class="btn btn-danger mt-3">Effacer</button>
    </form>
    <script src="public/js/JarditouUpdate.js"></script>
    <!--menu de navigation du pied de page-->
    <?php
    include("footer.php");
    ?>