<!--header-->
<?php 
    include("header.php");
?>

<!--Plan du site-->
        <div class="row d-flex mx-0">
            <div class=" col-12 "> 
                <ul class="nav flex-column">
                    <li class="nav-item dropdown">
                        <a class="h4 text-dark nav-link dropdown-toggle" data-toggle="dropdown" href="index.html" role="button" aria-haspopup="true" aria-expanded="false"> Accueil</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item " href="index.html#entreprise">L'entreprise</a>
                            <a class="dropdown-item " href="index.html#qualite">Qualité</a>
                            <a class="dropdown-item " href="index.html#devis">Devis</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="h4 text-dark nav-link" href="tableau.html">Tableau</a></li>
                    <li class="nav-item"><a class="h4 text-dark nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="h4 nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="mention.html" role="button" aria-haspopup="true" aria-expanded="false">Mentions légales</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item " href="mention.html#prix">Les Prix de vente</a>
                            <a class="dropdown-item " href="mention.html#produits">Les Produits</a>
                            <a class="dropdown-item " href="mention.html#données">CNIL – Données personnelles</a>
                            <a class="dropdown-item " href="mention.html#proprietes">Droit de propriété intellectuelle</a>
                            <a class="dropdown-item " href="mention.html#garanties">Garanties et responsabilités</a>
                            <a class="dropdown-item " href="mention.html#contact">Pour nous contacter</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="h4 text-dark nav-link" href="horaires.html">Horaires</a></li>
                    <li class="nav-item"><a class="h4 text-dark nav-link" href="plan.html">Plan du site</a></li>
                </ul>
            </div>
        </div>
<!--menu de navigation du pied de page-->
<?php 
    include("footer.php");
?>
