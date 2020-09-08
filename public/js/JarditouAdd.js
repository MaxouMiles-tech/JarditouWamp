
document .querySelector("#verifadd").onsubmit = function checkForm(f) 
{
    var check = true;
    var reference = document.getElementById("reference").value;
    var libelle = document.getElementById("libelle").value;
    var cat = document.getElementById("categorie").value;
    var prix = document.getElementById("prix").value;


    var filtretextnum = new RegExp (/^[\w\s]+$/);



    if (!filtretextnum.test(reference) )
    {
        document.getElementById("errorRef").innerHTML = "La Référence doit comporter au moins 1 caractère !";

        check = false; 
    }
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
    return check;
}
