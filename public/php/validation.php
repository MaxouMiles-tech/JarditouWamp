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

// declaration de variable qui recupere les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $question = $_POST['question'];

//variable necessaire à la validation du formulaire     
    $check = true;

// 3 cas possible : rien, expression REGEX et formulaire ok
//cas ou la variable est vide
    if (empty($nom)) 
    {
        echo "Le nom doit être renseigné ! <br>";
        $check = false;
    }
// regex : au moins un caractere alphabetique et chiffre
    else  if (!preg_match('/^[A-Za-z\d]+$/', $nom)) 
    {
        echo "Le Nom doit comporter au moins 1 caractère alphabétique! <br>";
        $check = false;
    }
// recap de la demande
    else 
    {
        echo "Nom : " . $nom . " , <br>";
    }

    if (empty($prenom)) 
    {
        echo "Le prénom doit être renseigné ! <br>";
        $check = false;
// regex : au moins un caractere alphanumerique
    }
    else if (!preg_match('/^[A-Za-z\d]+$/', $prenom)) 
    {
        echo "Le Prénom doit comporter au moins 1 caractère ! <br>";
        $check = false;
    }
    else
    {
        echo "Prénom : " . $prenom . " , <br>";
    }

    if (empty($_POST['sexe'])) 
    {
        echo "Le sexe doit être renseigné ! <br>";
        $check = false;
    }
    else
    {
        echo "Sexe : " . $_POST['sexe'] . " , <br>";
    }

    if (empty($date)) 
    {
        echo "La date de naissance doit être renseigné ! <br>";
        $check = false;
    }
// regex date sous forme mm/dd/aaaa
    else if (!preg_match('/^([0-2][0-9]|[3][0-1])\/([0][1-9]|[1][0-2])\/[0-2][0-9]{3}$/', $date)) 
    {
        echo "La Date doit etre sous le format : jj/mm/aaaa !  <br>";
        $check = false;
    }
    else
    {
        echo "Date de naissance : " . $date . " , <br>";
    }

    if (empty($cp)) 
    {
        echo "Le code postale doit être renseigné ! <br>";
        $check = false;
    }
// regex 5 caractere numerique
    else if (!preg_match('/^[0-9]{5}$/', $cp)) 
    {
        echo "Le code postal doit comporter 5 caractères numeriques !  <br>";
        $check = false;
    }
    else
    {
        echo "Code postal : " . $cp . " , <br>";
    }

    if (empty($email)) 
    {
        echo "L'email doit être renseigné ! <br>";
        $check = false;
    }
// regex email sous la forme nom.prenom@domaine.suffixe
    else if (!preg_match('/^[a-zA-Z0-9\d\._-]+@[a-zA-Z\d\.]+\.[a-zA-Z\d\.]{2,}+$/', $email)) 
    {
        echo "L'adresse email doit être sous la forme : nom.prenom@domaine.suffixe  !  <br>";
        $check = false;
    }
    else
    {
        echo " Email : " . $email . " , <br>";
    }

    if (empty($question)) 
    {
        echo "La question doit être renseigné ! <br>";
        $check = false;
    }
// regex caractere alphanumerique, point, underscore au moins une fois
    else if (!preg_match('/^[A-Za-z0-9\d\._]+$/', $question)) 
    {
        echo "La Question doit comporter au moins 1 caractère ! <br>";
        $check = false;
    }
    else
    {
        echo " Question : " . $question . " , <br>";
    }

    if (empty($_POST['acceptation'])) 
    {
        echo " Vous devez accepter le traitement informatique du formulaire !";
        $check = false;
    }
    else
    {
        echo " Vous accepté le traitement informatique de votre demande <br>";
    }

    // Si le formulaire ets valider envoie de la demande 
    if ($check) {
        echo "Votre demande de contact a été envoyé ! <br>";
    }
    ?>


<!--menu de navigation du pied de page-->
<div class="shadow mt-3 mb-1 mx-0">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark rounded">
        <ul class="navbar-nav ">
            <li class="nav-item"><a href="../../mention.php" class="nav-link"> Mentions légales</a><li>
            <li class="nav-item"><a href="../../horaires.php"class="nav-link"> Horaires</a><li>
            <li class="nav-item"><a href="../../plan.php" class="nav-link"> Plan du site</a><li>
        </ul>
    </nav>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>