<html>

<body>

<?php
    require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction deconnexion
 
$requete = "SELECT max(pro_id) as max_pro_id FROM produits ";
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

//  Renvoi de l'enregistrement sous forme d'un objet
$max = $result->fetch(PDO::FETCH_OBJ);


    // declaration de variable qui recupere la value
    $reference = $_POST['reference'];
    $categorie = $_POST['categorie'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $stock = $_POST['stock'];
    $couleur = $_POST['couleur'];
    $check = true;
    $bloque = $_POST['bloque'];
    $id = ($max->max_pro_id)+1;
    $photo = "jpg";
    $dateAjout = date('Y-m-d'); 

// 3 cas possible : rien, expression REGEX et formulaire ok
if (empty($reference)) {
    echo "La référence doit être renseignée ! <br>";
    $check = false;
} else {
    echo "Référence : " . $reference . " , <br>";
}
if (empty($categorie)) {
    echo "La catégorie doit être renseigné ! <br>";
    $check = false;
} else {
    echo "catégorie : " . $categorie . " , <br>";
}
if (empty($libelle)) {
    echo "Le libellé doit être renseignée ! <br>";
    $check = false;
} else {
    echo "Libellé : " . $libelle . " , <br>";
}
if (empty($description)) {
    echo "La description doit être renseignée ! <br>";
    $check = false;
} else {
    echo "description : " . $description . " , <br>";
}
if (empty($prix)) {
    echo "Le prix doit être renseignée ! <br>";
    $check = false;
} else  if (!preg_match('/[0-9 ]{1,}[,.]{0,1}[0-9]{0,2}[€]{0,1}/', $prix)) {
    echo "Le prix doit comporter au moins 1 caractère numérique! <br>";
    $check = false;
} else {
    echo "Prix : " . $prix . " , <br>";
}
if (empty($stock)) {
    echo "Le stock doit être renseignée ! <br>";
    $check = false;
} else  if (!preg_match('/^[0-9]$/', $stock)) {
    echo "Le stock doit comporter au moins 1 caractère numérique! <br>";
    $check = false;
} else {
    echo "stock : " . $stock . " , <br>";
}
if (empty($couleur)) {
    echo "La couleur doit être renseignée ! <br>";
    $check = false;
} else  if (!preg_match('/^[A-Za-z\d]+$/', $couleur)) {
    echo "La couleur doit comporter au moins 1 caractère alphabétique! <br>";
    $check = false;
} else {
    echo "couleur : " . $couleur . " , <br>";
}

if ($_POST['bloque']== 1) {
    echo "bloque : " . $_POST['bloque'] . " , <br>";
}
echo date('Y-m-d'). " , <br>";

if ($check) {
    echo "Le formulaire a été validé ! <br>";
}
 
$db-> exec ('INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)
            VALUE('.$id.','.$categorie.',"'.$reference.'","'.$libelle.'","'.$description.'",'.$prix.','.$stock.',"'.$couleur.'","'.$photo.'","'.$dateAjout.'",'.$bloque.')');


header("Location:../../tableau.php");
?>
</body>

</html>