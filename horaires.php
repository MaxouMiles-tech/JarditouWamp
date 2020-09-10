<!--header-->

<?php 
    include("header.php");
?>

<!-- titre de la page  -->  
<div class="row mt-3 mb-1 mx-0">
    <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Horaires</div>
</div>

<!--Tableau d'horaire-->
<div class="table-responsive ">
    <table class="table">
        <thead class="thead-light">
            <tr class="h2">
                <th>Votre magasin est ouvert du : </th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <tr class="table-warning">
                <td>Lundi au Vendredi</td>
                <td> De 7h à 19h30</td>
            </tr>
            <tr>
                <td>Samedi</td>
                <td>De 7h à 21h</td>
            </tr>
            <tr class="table-warning">
                <td>Dimanche</td>
                <td>Fermé</td>
            </tr>    
        </tbody>

    </table>
</div>

<!--menu de navigation du pied de page-->
<?php 
    include("footer.php");
?>
