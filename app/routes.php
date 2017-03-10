<?php
                    /* Définition des routes*/
$app->match('/', "ControleurStart::start"); //par défaut


$app->match('/afficher-{id}', "ControleurAffichage::affichage"); //route paramétrée avec l'id du menu


$app->match('/connexionAdmin', "ControleurConnexionAdmin::connexionAdmin"); //url tapé pour la connexion de l'admin
$app->match('/deconnexionAdmin', "ControleurConnexionAdmin::deconnexionAdmin"); //déconnexion de l'admin
$app->match('/verifierAdmin', "ControleurConnexionAdmin::verifierAdmin"); //verifier si l'admin existe


$app->match('/ajouterProf', "ControleurActionsAdmin::ajouterProf"); //ajouter un prof
$app->match('/ajouterContenu-{id}', "ControleurActionsAdmin::ajouterContenu"); //ajouter un contenu dont l'id du menu est passé en paramètre
$app->match('/ajouterImage-{id}', "ControleurActionsAdmin::ajouterImage"); //ajouter une / des image(/s) dont l'id de la galerie est passé en paramètre
$app->match('/ajouterVideo-{id}', "ControleurActionsAdmin::ajouterVideo"); //ajouter une / des vidéo(/s) dont l'id de la galerie est passé en paramètre
$app->match('/ajouterAudio-{id}', "ControleurActionsAdmin::ajouterAudio"); //ajouter une / des musique(/s) dont l'id de la galerie est passé en paramètre

$app->match('/supprimerProf-{id}', "ControleurActionsAdmin::supprimerProf"); //supprimer le prof dont l'id est passé en paramètre
$app->match('/supprimerContenu-{id}', "ControleurActionsAdmin::supprimerContenu"); //supprimer le contenu dont l'id est passé en paramètre
$app->match('/supprimerImage-{id}', "ControleurActionsAdmin::supprimerImage"); //supprimer une image dont l'id est passé en paramètre
$app->match('/supprimerVideo-{id}', "ControleurActionsAdmin::supprimerVideo"); //supprimer une vidéo dont l'id est passé en paramètre
$app->match('/supprimerAudio-{id}', "ControleurActionsAdmin::supprimerAudio"); //supprimer une musique dont l'id est passé en paramètre

$app->match('/modifierContenu-{id}', "ControleurActionsAdmin::modifierContenu"); //modifier le contenu dont l'id est passé en paramètre
$app->match('/modifierProf-{id}', "ControleurActionsAdmin::modifierProf"); //modifier le prof dont l'id est passé en paramètre
$app->match('/modifierPied', "ControleurActionsAdmin::modifierPied"); //modifier le pied
$app->match('/modifierMessage', "ControleurActionsAdmin::modifierMessage"); //modifier le message

$app->match('/validerModifContenu-{id}', "ControleurActionsAdmin::validerModifContenu"); //valider les modifications du contenu précédement sélectionné
$app->match('/validerModifProf-{id}', "ControleurActionsAdmin::validerModifProf"); //valider les modifications du prof précédement sélectionné
$app->match('/validerModifPied', "ControleurActionsAdmin::validerModifPied"); //valider les modifications du pied
$app->match('/validerModifMessage', "ControleurActionsAdmin::validerModifMessage"); //valider les modifications du message

$app->match('/validerAjoutContenu-{id}', "ControleurActionsAdmin::validerAjoutContenu"); //valider l'ajout du contenu
$app->match('/validerAjoutProf', "ControleurActionsAdmin::validerAjoutProf"); //valider l'ajout du prof
$app->match('/validerAjoutImage', "ControleurActionsAdmin::validerAjoutImage"); //valider l'ajout d'image(s)
$app->match('/validerAjoutVideo', "ControleurActionsAdmin::validerAjoutVideo"); //valider l'ajout de vidéo(s)
$app->match('/validerAjoutAudio', "ControleurActionsAdmin::validerAjoutAudio"); //valider l'ajout de musique(s)

$app->match('/modifierMenu', "ControleurActionsAdmin::modifierMenu"); //modifier le menu

$app->match('/archiverMenu-{id}', "ControleurActionsAdmin::archiverMenu"); //archiver le menu dont l'id est passé en paramètre
?>