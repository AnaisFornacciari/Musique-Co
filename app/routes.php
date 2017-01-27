<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut
$app->match('/afficher/{id}', "ControleurAffichage::affichage"); //route paramétrée avec l'id du menu

?>