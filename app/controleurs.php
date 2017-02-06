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
        $LesMenus = $pdo->getMenu();
        require_once __DIR__.'/../vues/v_entete.php';
    }
    
    public function start()
    {
        $pdo = PdoMC::getPdoMC();
        $LesContenus = $pdo->getContenus(1);
        $LesImages = $pdo->getImages(1);
        $menu = $pdo->getInfoMenu(1);
        $nomDuMenu = $menu['nomMenu'];
        /*require_once __DIR__.'/../vues/v_bandeau.php';*/
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
        $LesMenus = $this->pdo->getMenu();
        $pdo = $this->pdo;
        require_once __DIR__.'/../vues/v_entete.php';
    }

    public function affichage(Request $request, Application $app)
    {
        $this->init();
        $idMenu = $request->get('id');
        $menu = $this->pdo->getInfoMenu($idMenu);
        if(!$menu['sousMenu'])
        {
            $nomDuMenu = $menu['nomMenu'];
        }
        else
        {
            $nomDuMenu = $menu['nomSousMenu'];
        }
        $categ = $menu['categ'];
        switch ($categ) 
        {
            case 'T':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'P':
                $prof = $this->pdo->getProf();
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_prof.php';
                break;
            case 'E':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_tarif.php';
                break;
            case 'G':
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_galerie.php';
                break;
            case 'N':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_news.php';
                break;
            case 'C':
                $LesContenus = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_contact.php';
                break;
        }
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }
}
?>