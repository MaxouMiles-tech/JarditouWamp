<!--header-->
<?php
include("header.php");

?>

<!-- titre de la page  -->  
<div class="row mt-3 mb-1 mx-0">
    <div class="col h2 rounded bg-dark text-white-50 p-3 text-center">Plan du site</div>
</div>

<div class="navbar col-12 d-flex mx-0 ">
    <ul class="navbar-nav mr-auto  mt-lg-0  flex-column">
        <li class="nav-item dropdown">
            <a class="h4 text-dark nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false"> Accueil</a>
            <div class="dropdown-menu">
                <a class="dropdown-item " href="index.php#entreprise">L'entreprise</a>
                <a class="dropdown-item " href="index.php#qualite">Qualité</a>
                <a class="dropdown-item " href="index.php#devis">Devis</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="h4 h4 nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="tableau.php" role="button" aria-haspopup="true" aria-expanded="false">Catalogue</a>
            <div class="dropdown-menu">
                <a class="dropdown-item " href="tableau.php"  >Catalogue de produit</a>
                <a class="dropdown-item " href="add_form.php">Nouveau produit</a>
            </div>
        </li>
        <li class="nav-item"><a class="h4 text-dark nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item dropdown">
            <a class="h4 nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="mention.php" role="button" aria-haspopup="true" aria-expanded="false">Mentions légales</a>
            <div class="dropdown-menu">
                <a class="dropdown-item " href="mention.php#prix">Les Prix de vente</a>
                <a class="dropdown-item " href="mention.php#produits">Les Produits</a>
                <a class="dropdown-item " href="mention.php#données">CNIL – Données personnelles</a>
                <a class="dropdown-item " href="mention.php#proprietes">Droit de propriété intellectuelle</a>
                <a class="dropdown-item " href="mention.php#garanties">Garanties et responsabilités</a>
                <a class="dropdown-item " href="mention.php#contact">Pour nous contacter</a>
            </div>
        </li>
        <li class="nav-item"><a class="h4 text-dark nav-link" href="horaires.php">Horaires</a></li>
        <li class="nav-item"><a class="h4 text-dark nav-link" href="plan.php">Plan du site</a></li>
    </ul>
</div>

<!--menu de navigation du pied de page-->
<?php
include("footer.php");
?>