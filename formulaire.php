<?php
echo'<div>'




echo'</div>'

?>


<!-- 
        <p class="mt-4">* Ces zones sont obligatoires</p>
        <h1>Vos coordonnées</h1>
        <form action="public/php/Jarditou.php" method="POST" id= "form1" name="form1">
            <div class="form-group">
                <label for="nom">Nom*</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder= "Veuillez saisir votre nom" >
            </div>
            <p  id="errorNom" class="text-danger""></p>
            <div class="form-group">
                <label for="prenom">Prénom*</label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder= "Veuillez saisir votre prénom">
            </div>
            <p  id="errorPrenom" class="text-danger""></p>
            <div class="form-group">
                <p><label>Sexe*</label></p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="feminin" value="Féminin" >
                    <label class="form-check-label" for="feminin">Féminin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="masculin" value="Masculin">
                    <label class="form-check-label" for="masculin">Masculin</label>
                </div>
            </div>
            <p  id="errorSexe" class="text-danger""></p>
            <div class="form-group">
                <label for="date">Date de naissance*</label>
                <input type="text" class="form-control" id="date" name="date">
            </div>
            <p  id="errorDate" class="text-danger""></p>
            <div class="form-group">
                <label for="codePostal">Code Postal*</label>
                <input type="text" class="form-control" id="codePostal" name = "cp">
            </div>
            <p  id="errorCp" class="text-danger""></p>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse">
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" name = "ville" id="ville">
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="text" class="form-control" name="email" id="email" placeholder= "dave.loper@afpa.fr">
            </div>
            <p  id="errorEmail" class="text-danger""></p>
        <h1>Votre demande</h1>
            <div class="form-group">
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
                <textarea class="form-control" name="question" id="votrequestion" ></textarea>
              </div>
              <p  id="errorQuestion" class="text-danger""></p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="ok"  name="acceptation"  id="acceptation">
                <label class="form-check-label" for="acceptation">J'accepte le traitement informatique de ce formulaire. </label>
              </div>
              <p  id="errorTraitement" class="text-danger mt-3""></p>
              <button type="submit" name="bouton" class="btn btn-dark mt-3 mr-1">Envoyer</button>
              <button type="reset" name="bouton" class="btn btn-dark mt-3">Annuler</button>
        </form>
    </div> 
