<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut
$app->match('/afficher/{id}', "ControleurAffichage::affichage"); //route paramétrée avec l'id du menu
$app->match('/connexionAdmin', "ControleurConnexionAdmin::connexionAdmin"); //url tapé pour la connexion de l'admin
$app->match('/deconnexionAdmin', "ControleurConnexionAdmin::deconnexionAdmin"); //url tapé pour la connexion de l'admin
$app->match('/verifierAdmin', "ControleurConnexionAdmin::verifierAdmin"); //verifier si l'admin existe
$app->match('/modifierContenu/{id}', "ControleurActionsAdmin::modifierContenu"); //verifier si l'admin existe

?>