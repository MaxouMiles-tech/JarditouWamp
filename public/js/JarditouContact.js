// validation java du formulaire contact
document .querySelector("#verifcontact").onsubmit = function checkForm(f) 
{
    // variable a true qui sera verfifier à chaque condition
    var check = true;

// creation des variable obligatoire: on recupere les valeurs entrées grace à l'identifiant
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var sexe = document.getElementsByName("sexe");
    var date = document.getElementById("date").value;
    var codepostal = document.getElementById("codePostal").value;
    var email = document.getElementById("email").value;
    var votrequestion = document.getElementById("votrequestion").value;
    var traitement = document.getElementById("acceptation").checked; // retourn un booleen 

// regex qui accepte tous les caracteres de l'alphabet avec un min d'un caractere
    var filtrealpha = new RegExp (/^[A-Za-z]+$/);

// chaque champ est teste par une expression reguliere et retourne la variable à false
    if (!filtrealpha.test(nom) )
    {
// un message d'erreur est ecrit à la suite du champ      
        document.getElementById("errorNom").innerHTML = "Le Nom doit comporter au moins 1 caractère !";
        check = false; 
    }
    else
    {
// reinitialise le champ erreur         
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

// regex qui accepte les caracteres numériques sous la forme jj/mm/aaaa
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

// la recuperation des boutons radio se fait sur un tableau , test si l'un ou l'autre a ete checker    
    if(!sexe[0].checked && !sexe[1].checked )
    {
        document.getElementById("errorSexe").innerHTML = "Vous devez cocher le Sexe ! " ;
        check = false;
    }
    else
    {
        document.getElementById("errorSexe").innerHTML = "" ;
    }

// regex qui accepte 5 caracteres numériques 
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

// regex qui controle la presence d'un @
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

// si tout se passe bien la variable est retourner sans modification
    return check;
}
