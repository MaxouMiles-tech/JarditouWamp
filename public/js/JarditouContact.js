
document .querySelector("#verifcontact").onsubmit = function checkForm(f) 
{
    var check = true;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var sexe = document.getElementsByName("sexe");
    var date = document.getElementById("date").value;
    var codepostal = document.getElementById("codePostal").value;
    var email = document.getElementById("email").value;
    var votrequestion = document.getElementById("votrequestion").value;
    var traitement = document.getElementById("acceptation").checked;


// condition 1 caractere
    var filtrealpha = new RegExp (/^[A-Za-z]+$/);
    if (!filtrealpha.test(nom) )
    {
        document.getElementById("errorNom").innerHTML = "Le Nom doit comporter au moins 1 caractère !";
        check = false; 
    }
    else
    {
        document.getElementById("errorNom").innerHTML = "";
    }
    if (!filtrealpha.test(prenom))
    {
        document.getElementById("errorPrenom").innerHTML = "Le Prénom doit comporter au moins 1 caractère !";
        check = false;
    }
    else
    {
        document.getElementById("errorPrenom").innerHTML = "";
    }
    var filtredate = new RegExp (/^([0-2][0-9]|[3][0-1])\/([0][1-9]|[1][0-2])\/[0-2][0-9]{3}$/)
    if (!filtredate.test(date))
    {
        document.getElementById("errorDate").innerHTML = "La Date doit etre sous le format : jj/mm/aaaa !";
        check = false;
    }
    else
    {
        document.getElementById("errorDate").innerHTML = "";
    }    
    if(!sexe[0].checked && !sexe[1].checked )
    {
        document.getElementById("errorSexe").innerHTML = "Vous devez cocher le Sexe ! " ;
        check = false;
    }
    else
    {
        document.getElementById("errorSexe").innerHTML = "" ;
    }
//condition 5 numeriques 
    var filtrecp = new RegExp(/^[0-9]{5}$/);
    if (!filtrecp.test(codepostal))
    {
       document.getElementById("errorCp").innerHTML ="Le code postal doit comporter 5 caractères numeriques !";
       check =  false; 
    }
    else
    {
        document.getElementById("errorCp").innerHTML ="";
    }
// condition email    
    var filtremail = new RegExp(/@/);
    if (!filtremail.test(email))
    {
        document.getElementById("errorEmail").innerHTML = "L'adresse email doit comporter un '@' !";
        check =  false;
    }
    else
    {
        document.getElementById("errorEmail").innerHTML = "";
    }
    if (!filtrealpha.test(votrequestion))
    {
        document.getElementById("errorQuestion").innerHTML = "Votre question doit comporter au moins 1 caractère !";
        check = false;
    }
    else
    {
        document.getElementById("errorQuestion").innerHTML = "";
    }
    if (!traitement)
    {
        document.getElementById("errorTraitement").innerHTML = " Vous devez accepter le traitement informatique du formulaire !";
        check = false;
    } 
    else
    {
        document.getElementById("errorTraitement").innerHTML = "";
    }

    return check;
}
