<html>

<body>
    <?php
    // declaration de variable qui recupere la value
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $question = $_POST['question'];
    $check = true;

// 3 cas possible : rien, expression REGEX et formulaire ok
    if (empty($nom)) {
        echo "Le nom doit être renseigné ! <br>";
        $check = false;
    } else  if (!preg_match('/^[A-Za-z\d]+$/', $nom)) {
        echo "Le Nom doit comporter au moins 1 caractère alphabétique! <br>";
        $check = false;
    } else {
        echo "Nom : " . $nom . " , <br>";
    }

    if (empty($prenom)) {
        echo "Le prénom doit être renseigné ! <br>";
        $check = false;
    } else if (!preg_match('/^[A-Za-z\d]+$/', $prenom)) {
        echo "Le Prénom doit comporter au moins 1 caractère ! <br>";
        $check = false;
    } else {
        echo "Prénom : " . $prenom . " , <br>";
    }

    if (empty($_POST['sexe'])) {
        echo "Le sexe doit être renseigné ! <br>";
        $check = false;
    } else {
        echo "Sexe : " . $_POST['sexe'] . " , <br>";
    }
    if (empty($date)) {
        echo "La date de naissance doit être renseigné ! <br>";
        $check = false;
    } else if (!preg_match('/^([0-2][0-9]|[3][0-1])\/([0][1-9]|[1][0-2])\/[0-2][0-9]{3}$/', $date)) {
        echo "La Date doit etre sous le format : jj/mm/aaaa !  <br>";
        $check = false;
    } else {
        echo "Date de naissance : " . $date . " , <br>";
    }

    if (empty($cp)) {
        echo "Le code postale doit être renseigné ! <br>";
        $check = false;
    } else if (!preg_match('/^[0-9]{5}$/', $cp)) {
        echo "Le code postal doit comporter 5 caractères numeriques !  <br>";
        $check = false;
    } else {
        echo "Code postal : " . $cp . " , <br>";
    }

    echo "Adresse : " . $_POST['adresse'] . " , <br>";
    echo "Ville : " . $_POST['ville'] . " , <br>";

    if (empty($email)) {
        echo "L'email doit être renseigné ! <br>";
        $check = false;
    } else if (!preg_match('/^[a-zA-Z0-9\d\._-]+@[a-zA-Z\d\.]+\.[a-zA-Z\d\.]{2,}+$/', $email)) {
        echo "L'adresse email doit être sous la forme : nom.prenom@hote.suffixe  !  <br>";
        $check = false;
    } else {
        echo " Email : " . $email . " , <br>";
    }

    echo "Sujet : " . $_POST['sujet'] . " , <br>";

    if (empty($question)) {
        echo "La question doit être renseigné ! <br>";
        $check = false;
    } else if (!preg_match('/^[A-Za-z0-9\d\._]+$/', $question)) {
        echo "La Question doit comporter au moins 1 caractère ! <br>";
        $check = false;
    } else {
        echo " Question : " . $question . " , <br>";
    }

    if (empty($_POST['acceptation'])) {
        echo " Vous devez accepter le traitement informatique du formulaire !";
        $check = false;
    } else {
        echo " Traitement : " . $_POST['acceptation'] . " , <br>";
    }

    if ($check) {
        echo "Le formulaire a été validé ! <br>";
    }
    ?>
</body>

</html>