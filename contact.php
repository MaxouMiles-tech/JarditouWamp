<!--  header -->
<?php
include("header.php");
?>

<!-- titre de la page  -->
<div class="row mt-3 mb-1 mx-0">
    <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Contact</div>
</div>
<h1>Vos coordonnées</h1><hr>
<p class="mt-4">* Ces zones sont obligatoires</p>

<!-- formlaire d'ajout de contact -->
<!-- debut du formulaire : redirection vers le script php -->
<form action="public/php/validation.php" method="POST" id="verifcontact" name="verifcontact">
    <div class="form-group">
        <label for="nom">Nom*</label>
        <input type="text" class="form-control" name="nom" id="nom" required placeholder="Veuillez saisir votre nom">
    </div>
<!-- balise paragraphe pour l'affichage d'erreur js -->
    <p id="errorNom" class="text-danger""></p>
    
    <div class=" form-group">
        <label for="prenom">Prénom*</label>
        <input type="text" class="form-control" name="prenom" id="prenom" required placeholder="Veuillez saisir votre prénom">
    </div>
    <p id="errorPrenom" class="text-danger""></p>

    <div class=" form-group">
        <p><label>Sexe*</label></p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" required id="feminin" value="Féminin">
            <label class="form-check-label" for="feminin">Féminin</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="Masculin">
            <label class="form-check-label" for="masculin">Masculin</label>
        </div>
    </div>
    <p id="errorSexe" class="text-danger""></p>

    <div class=" form-group">
        <label for="date">Date de naissance*</label>
        <input type="date" class="form-control" id="date" required name="date">
    </div>
    <p id="errorDate" class="text-danger""></p>
    
    <div class=" form-group">
            <label for="codePostal">Code Postal*</label>
            <input type="number" class="form-control" required id="codePostal" name="cp">
    </div>
    <p id="errorCp" class="text-danger""></p>

    <div class=" form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" name="adresse" id="adresse">
    </div>

    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" name="ville" id="ville">
    </div>

    <div class="form-group">
        <label for="email">Email*</label>
        <input type="text" class="form-control" required name="email" id="email" placeholder="dave.loper@afpa.fr">
    </div>
    <p id="errorEmail" class="text-danger""></p>

    <h1>Votre demande</h1><hr>
    <div class=" form-group">
        <label for="sujet">Sujet</label>
        <select class="form-control" name="sujet" id="sujet">
            <option value="" selected disabled>Veuillez sélectionner un sujet</option>
            <option value="Mes commandes">Mes commandes</option>
            <option value="Question Sur Un Produit">Question sur un produit</option>
            <option value="Réclamation">Réclamation</option>
            <option value="Autres">Autres</option>
        </select>
    </div>

    <div class="form-group">
        <label for="votrequestion">Votre question* : </label>
        <textarea class="form-control" required name="question" id="votrequestion"></textarea>
    </div>
    <p id="errorQuestion" class="text-danger""></p>

    <div class=" form-check">
        <input class="form-check-input" type="checkbox" value="ok" name="acceptation" id="acceptation">
        <label class="form-check-label" for="acceptation">J'accepte le traitement informatique de ce formulaire. </label>
    </div>
    <p id="errorTraitement" class="text-danger mt-3""></p>

    <button type=" submit" name="bouton" class="btn btn-dark mt-3 mr-1">Envoyer</button>
    <button type="reset" name="bouton" class="btn btn-dark mt-3">Annuler</button>
</form>

<!-- script js -->
<script src="public/js/JarditouContact.js"></script>

<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>