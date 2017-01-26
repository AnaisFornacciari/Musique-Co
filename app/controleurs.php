<?php
require_once __DIR__.'/../modele/class_pdo.php';
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

//**************************************Contrôleur de première visite*****************//
Class ControleurStart
{
    public function __construct()
    {
        ob_start();             // démarre le flux de sortie
        $pdo = PdoMC::getPdoMC();
        $lesMenus = $pdo->getMenu();
        require_once __DIR__.'/../vues/v_entete.php';
    }
    
    public function start()
    {
        require_once __DIR__.'/../vues/v_bandeau.php';
        require_once __DIR__.'/../vues/v_texte.php';
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean(); // récupère le contenu du flux et le vide
        return $view;           // retourne le flux 
    }
}
//**************************************Contrôleur des différentes catégories d'affichage*****************//

Class ControleurAffichage 
{
    private $pdo;

    public function init()
    {
        $this->pdo = PdoMC::getPdoMC();
        ob_start();             // démarre le flux de sortie
        require_once __DIR__.'/../vues/v_entete.php';
        require_once __DIR__.'/../vues/v_pied.php';
    }

    public function categorie()
    {
        $this->init();
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }
}
?>