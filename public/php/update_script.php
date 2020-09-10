<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarditou</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<!-- page Html pour faire figurer les messages d'erreurs -->

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
            <a class="navbar-brand" href="../../index.php">Jarditou.com</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../index.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../tableau.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../contact.php">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>

<!-- script php  -->
        <?php

// Inclusion bibliothèque 
        require "connexion_bdd.php";

// Appel de la fonction deconnexion 
        $db = connexionBase(); 

//variable necessaire à la validation du formulaire 
        $check = true;

// declaration de variable qui recupere les valeurs du formulaire       
        $id = $_POST['id'];
        $reference = $_POST['reference'];
        $categorie = $_POST['categorie'];
        $libelle = $_POST['libelle'];
        $descrip = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $bloque = $_POST['bloque'];
        $datemodif = date('Y-m-d');

// Création de la variable qui va stocker le texte en minuscule
        $texteMinuscule = strtolower($_POST["couleur"]);

// Création de la variable qui va mettre en majuscule la première lettre
        $couleur = ucwords($texteMinuscule);

// gestion du telechargement de la photo
        if (!empty($_FILES["photo"]["name"])) 
        {
            $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);

// On met les types autorisés dans un tableau (ici pour une image)
            $aMimeTypes = array("image/ai", "image/eps", "image/jpeg", "image/gif", "image/pdf", "image/jpg", "image/png",  "image/psd", "image/tiff", "image/svg");

// On extrait le type du fichier via l'extension FILE_INFO 
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
            finfo_close($finfo);

            if (in_array($mimetype, $aMimeTypes)) 
            {
                if (isset($_FILES['photo']) and $_FILES["photo"]["error"] == 0) 
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], '../../public/images/' . $id . "." . $extension);
                }
            }
            else 
            {
// Le type n'est pas autorisé, donc ERREUR
                echo "Type de fichier non autorisé";
                exit;
            }
        }
        else 
        {
// on garde l'extention existant (input hidden)
            $extension = $_POST['extension'];
        }

//validation des champs necessaires du formulaire 
//ces champs ne doivent pas etre vide sinon renvoie false ce qui empeche l'envoi du formulaire
        if (empty($reference)) 
        {
            echo "La référence doit être renseignée ! <br>";
            $check = false;
        }
        if (empty($categorie)) 
        {
            echo "La catégorie doit être renseigné ! <br>";
            $check = false;
        }
        if (empty($libelle)) 
        {
            echo "Le libellé doit être renseignée ! <br>";
            $check = false;
        }

//regex pour controler le format du prix
        if (!preg_match('/^[0-9]{1,}[.|,]{0,1}[0-9]{0,2}$/', $prix)) 
        {
            echo "Le prix doit comporter au moins 1 caractère numérique! <br>";
            $check = false;
        }

//regex au moins un entier        
        if (!preg_match('/^[0-9]+$/', $stock)) 
        {
            echo "Le stock doit comporter au moins 1 caractère numérique! <br>";
            $check = false;
        }

//si le formulaire est valide on execute la modif avec une requete preparee
        if ($check) 
        {
            $stmt = $db->prepare('UPDATE produits 
                                    SET pro_cat_id =:categorie ,pro_ref =:reference,pro_libelle= :libelle, pro_description =:descrip,pro_prix = :prix, pro_stock =:stock, pro_couleur =:couleur,pro_photo= :extension, pro_d_modif =:dateModif,pro_bloque= :bloque
                                    Where pro_id=:id');

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":categorie", $categorie, PDO::PARAM_INT);
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":libelle", $libelle, PDO::PARAM_STR);
            $stmt->bindParam(":descrip", $descrip, PDO::PARAM_STR);
            $stmt->bindParam(":prix", $prix, PDO::PARAM_INT);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
            $stmt->bindParam(":couleur", $couleur, PDO::PARAM_STR);
            $stmt->bindParam(":extension", $extension, PDO::PARAM_STR);
            $stmt->bindParam(":dateModif", $dateModif, PDO::PARAM_STR);
            $stmt->bindParam(":bloque", $bloque, PDO::PARAM_INT);

            $stmt->execute();

//redirection vers la page du catalogue
            header("Location:../../tableau.php");
        }
        ?>

<!--menu de navigation du pied de page-->
<div class="shadow mt-3 mb-1 mx-0">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark rounded">
        <ul class="navbar-nav ">
            <li class="nav-item"><a href="../../mention.php" class="nav-link"> Mentions légales</a>
            <li>
            <li class="nav-item"><a href="../../horaires.php" class="nav-link"> Horaires</a>
            <li>
            <li class="nav-item"><a href="plan.php" class="nav-link"> Plan du site</a>
            <li>
        </ul>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>