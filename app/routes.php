<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut

$app->match('/afficher/{id}', "ControleurAffichage::categorie()");

?>