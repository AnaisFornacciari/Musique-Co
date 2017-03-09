<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut


$app->match('/afficher-{id}', "ControleurAffichage::affichage"); //route paramétrée avec l'id du menu


$app->match('/connexionAdmin', "ControleurConnexionAdmin::connexionAdmin"); //url tapé pour la connexion de l'admin
$app->match('/deconnexionAdmin', "ControleurConnexionAdmin::deconnexionAdmin"); //déconnexion de l'admin
$app->match('/verifierAdmin', "ControleurConnexionAdmin::verifierAdmin"); //verifier si l'admin existe


$app->match('/ajouterProf', "ControleurActionsAdmin::ajouterProf"); //ajouter un prof
$app->match('/ajouterContenu', "ControleurActionsAdmin::ajouterContenu"); //ajouter un contenu dont l'id du menu est passé en paramètre

$app->match('/modifierContenu-{id}', "ControleurActionsAdmin::modifierContenu"); //modifier le contenu dont l'id est passé en paramètre
$app->match('/modifierProf-{id}', "ControleurActionsAdmin::modifierProf"); //modifier le prof dont l'id est passé en paramètre
$app->match('/modifierPied', "ControleurActionsAdmin::modifierPied"); //modifier le pied
$app->match('/modifierMessage', "ControleurActionsAdmin::modifierMessage"); //modifier le message

$app->match('/validerModifContenu-{id}', "ControleurActionsAdmin::validerModifContenu"); //valider les modifications du contenu précédement sélectionné
$app->match('/validerModifProf-{id}', "ControleurActionsAdmin::validerModifProf"); //valider les modifications du prof précédement sélectionné
$app->match('/validerModifPied', "ControleurActionsAdmin::validerModifPied"); //valider les modifications du pied
$app->match('/validerModifMessage', "ControleurActionsAdmin::validerModifMessage"); //valider les modifications du message

$app->match('/modifierMenu', "ControleurActionsAdmin::modifierMenu"); //modifier le pied
?>