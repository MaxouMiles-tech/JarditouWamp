<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarditou</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    <!-- logo  -->
    <div class="container-fluid">
        <div class="row d-none d-md-flex">
            <img class="col-2 img-fluid" src="../images/jarditou_logo.jpg" alt="Logo Jarditou" title="Logo Jarditou" id="logo"><br>
            <div class="col-10 h2 align-self-center text-right  ">Tout le jardin</div>
        </div>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Jarditou.com</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tableau.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>

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
        $id = ($max->max_pro_id) + 1;
        $photo = "jpg";
        $dateAjout = date('Y-m-d');

        // 3 cas possible : rien, expression REGEX et formulaire ok
        if (empty($reference)) {
            echo "La référence doit être renseignée ! <br>";
            $check = false;
        }
        if (empty($categorie)) {
            echo "La catégorie doit être renseigné ! <br>";
            $check = false;
        }
        if (empty($libelle)) {
            echo "Le libellé doit être renseignée ! <br>";
            $check = false;
        }
        if (empty($description)) {
            echo "La description doit être renseignée ! <br>";
            $check = false;
        }
        if (empty($prix)) {
            echo "Le prix doit être renseignée ! <br>";
            $check = false;
        } else  if (!preg_match('/[0-9 ]{1,}[,.]{0,1}[0-9]{0,2}[€]{0,1}/', $prix)) {
            echo "Le prix doit comporter au moins 1 caractère numérique! <br>";
            $check = false;
        }
        if (empty($stock)) {
            echo "Le stock doit être renseignée ! <br>";
            $check = false;
        } else  if (!preg_match('/^[0-9]$/', $stock)) {
            echo "Le stock doit comporter au moins 1 caractère numérique! <br>";
            $check = false;
        }
        if (empty($couleur)) {
            echo "La couleur doit être renseignée ! <br>";
            $check = false;
        } else  if (!preg_match('/^[A-Za-z\d]+$/', $couleur)) {
            echo "La couleur doit comporter au moins 1 caractère alphabétique! <br>";
            $check = false;
        }
        if ($check) {
            $requete = 'SELECT pro_id FROM produits 
                        WHERE pro_ref ="' . $reference . '" AND pro_libelle ="' . $libelle . '" AND pro_couleur ="' . $couleur . '"';
            $result = $db->query($requete);
            if (!$result->fetch(PDO::FETCH_OBJ)) {
                $db->exec('INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)
                VALUE(' . $id . ',' . $categorie . ',"' . $reference . '","' . $libelle . '","' . $description . '",' . $prix . ',' . $stock . ',"' . $couleur . '","' . $photo . '","' . $dateAjout . '",' . $bloque . ')');
                header("Location:../../tableau.php");
            } else {
                echo '<br>Votre produit existe déjà !!';
            }
        }
        ?>
</body>
<!--menu de navigation du pied de page-->
<?php
include("../../footer.php");
?>

</html>