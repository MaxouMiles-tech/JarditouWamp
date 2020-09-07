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

        <?php
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
        $db = connexionBase(); // Appel de la fonction deconnexion
        $pro_id = $_GET["id"];

        $requete = 'SELECT pro_photo from produits
        where pro_id=' . $pro_id;
        $result = $db->query($requete);


        $produit = $result->fetch(PDO::FETCH_OBJ);
        $extension =$produit->pro_photo;

        $query = "DELETE FROM produits Where pro_id  = $pro_id";
        /* Envoie de la requête */
        $result = $db->query($query);

        if ($result) {
            $chemin = '../../public/images/'.$pro_id.'.'.$extension;
            unlink($chemin);
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
                    <li class="nav-item"><a href="../../plan.php" class="nav-link"> Plan du site</a>
                    <li>
                </ul>
            </nav>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>