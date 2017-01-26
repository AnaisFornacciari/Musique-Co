<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut
$app->get('/ping', function() use ($app) {
 return "pong";
 });
$app->get('/afficher/{id}', "ControleurAffichage::categorie($id)");

?>