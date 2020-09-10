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
            <a class="navbar-brand" href="index.php">Jarditou.com</a>
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

// requette pour recuperer l'id max dans la base pour renommer l'image
        $requete = "SELECT max(pro_id) as max_pro_id FROM produits ";
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
// Pas d'enregistrement
            die("La table est vide");
        }

//affecte a $max la premiere ligne du resultat sous forme de tableau d'objets
        $max = $result->fetch(PDO::FETCH_OBJ);

// declaration de variable qui recupere les valeurs du formulaire
        $reference = $_POST['reference'];
        $categorie = $_POST['categorie'];
        $libelle = $_POST['libelle'];
        $descrip = $_POST['description'];
        $prix = $_POST['prix'];
        $stock = $_POST['stock'];
        $bloque = $_POST['bloque'];
        $dateAjout = date('Y-m-d');

// Création de la variable qui va stocker le texte en minuscule
        $texteMinuscule = strtolower($_POST["couleur"]);

// Création de la variable qui va mettre en majuscule la première lettre
        $couleur = ucwords($texteMinuscule);

//variable necessaire à la validation du formulaire 
        $check = true;
        $id = ($max->max_pro_id) + 1;

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
//reinitialiastion de la variable 
            $extension = null;
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
        if (empty($prix)) 
        {
            echo "Le prix doit être renseignée ! <br>";
            $check = false;
//regex pour controler le format du prix
        }
        else  if (!preg_match('/[0-9 ]{1,}[,.]{0,1}[0-9]{0,2}[€]{0,1}/', $prix)) 
        {
            echo "Le prix doit comporter au moins 1 caractère numérique! <br>";
            $check = false;
        }

//si le formulaire est valide on verifie l'existence du produit grace a 4 criteres
        if ($check) 
        {
            $stmt = $db->prepare('SELECT pro_id FROM produits WHERE pro_ref =:reference AND pro_libelle =:libelle AND pro_couleur =:couleur');
            $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
            $stmt->bindParam(":libelle", $libelle, PDO::PARAM_STR);
            $stmt->bindParam(":couleur", $couleur, PDO::PARAM_STR);
            $stmt->execute();
    
//si il n'y a pas de resulat on ajoute le porduit avec une requete preparé          
            if (!$stmt->fetch(PDO::FETCH_OBJ)) 
            {
                $stmt = $db->prepare('INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque) 
                                      VALUES(:id, :categorie, :reference, :libelle, :descrip, :prix, :stock, :couleur, :extension, :dateAjout, :bloque)');
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->bindParam(":categorie", $categorie, PDO::PARAM_INT);
                $stmt->bindParam(":reference", $reference, PDO::PARAM_STR);
                $stmt->bindParam(":libelle", $libelle, PDO::PARAM_STR);
                $stmt->bindParam(":descrip", $descrip, PDO::PARAM_STR);
                $stmt->bindParam(":prix", $prix, PDO::PARAM_INT);
                $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
                $stmt->bindParam(":couleur", $couleur, PDO::PARAM_STR);
                $stmt->bindParam(":extension", $extension, PDO::PARAM_STR);
                $stmt->bindParam(":dateAjout", $dateAjout, PDO::PARAM_STR);
                $stmt->bindParam(":bloque", $bloque, PDO::PARAM_INT);
    
                $stmt->execute();

//redirection vers la page du catalogue
                header("Location:../../tableau.php");
            }
            else 
            {
             
// sinon le produit existe deja : erreur 
                echo '<br>Votre produit existe déjà !!';
            }
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