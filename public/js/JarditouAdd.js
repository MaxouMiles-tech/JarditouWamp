// validation java du formulaire d'ajout
document .querySelector("#verifadd").onsubmit = function checkForm(f) 
{
// variable a true qui sera verfifier à chaque condition
    var check = true;

//creation des variable obligatoire:  on recupere les valeurs entrées grace à l'identifiant
    var reference = document.getElementById("reference").value;
    var libelle = document.getElementById("libelle").value;
    var cat = document.getElementById("categorie").value;
    var prix = document.getElementById("prix").value;

// regex qui accepte tous les caracteres de l'alphabet, underscore et espaces avec un min d'un caractere
    var filtretextnum = new RegExp (/^[\w\s]+$/);

// chaque champ est teste par l'expression reguliere et retourne la variable à false
    if (!filtretextnum.test(reference) )
    {
// un message d'erreur est ecrit à la suite du champ
        document.getElementById("errorRef").innerHTML = "La Référence doit comporter au moins 1 caractère !";
        check = false; 
    }

// reinitialise le champ erreur     
    else
    {
        document.getElementById("errorRef").innerHTML = "";
    }
    if (!filtretextnum.test(libelle))
    {
        document.getElementById("errorLibelle").innerHTML = "Le Libellé doit comporter au moins 1 caractère !";
        check = false;
    }
    else
    {
        document.getElementById("errorLibelle").innerHTML = "";
    }
    if (cat == ""){
    document.getElementById("errorCat").innerHTML = "La Catégorie doit être renseignée !";
    check = false;
    }
    else
    {
        document.getElementById("errorCat").innerHTML = "";
    }
    var filtreprice = new RegExp (/^[0-9]{1,}[.|,]{0,1}[0-9]{0,2}$/)
    if (!filtreprice.test(prix))
    {
        document.getElementById("errorPrix").innerHTML = "Le prix n'est pas au bon format, utilise une virgule ou un point ! !";
        check = false;
    }
    else
    {
        document.getElementById("errorPrix").innerHTML = "";
    }
    
// si tout se passe bien la variable est retourner sans modification
    return check;
}
