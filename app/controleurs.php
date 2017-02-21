<?php
require_once __DIR__.'/../modele/class_pdo.php';
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

//**************************************Contrôleur de première visite*****************//
Class ControleurStart
{
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = PdoMC::getPdoMC();
        ob_start();             // démarre le flux de sortie
        $LesMenus = $this->pdo->getMenu();
        require_once __DIR__.'/../vues/v_entete.php';
    }
    
    public function start()
    {
        $LesContenus = $this->pdo->getContenus(1);
        $LesImages = $this->pdo->getImages(1);
        $menu = $this->pdo->getInfoMenu(1);
        $nomDuMenu = $menu['nomMenu'];
        $routeImage = 1;        //pour la route de l'image lors de la première visite sur le site + (../public)
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
        $LesMenus = $this->pdo->getMenu();
        require_once __DIR__.'/../vues/v_entete.php';
    }

    public function affichage(Request $request, Application $app)
    {
        $this->init();
        $idMenu = $request->get('id');
        $menu = $this->pdo->getInfoMenu($idMenu);
        if(!isset($menu['nomSousMenu']))    //définis le nom du menu ou sous-menu
        {
            $nomDuMenu = $menu['nomMenu'];
        }
        else
        {
            $nomDuMenu = $menu['nomSousMenu'];
        }
        $categ = $menu['categ'];
        switch ($categ)         //permet d'afficher la bonne mise en page du menu selon sa catégorie
        {
            case 'A':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'T':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'P':
                $LesProfs = $this->pdo->getProf();
                require_once __DIR__.'/../vues/v_prof.php';
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
                require_once __DIR__.'/../vues/v_contact.php';
                break;
        }
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }
}

//**************************************Contrôleur Connexion Admin*****************//
Class ControleurConnexionAdmin
{
    private $pdo;

    public function init()
    {
        $this->pdo = PdoMC::getPdoMC();
        ob_start();             // démarre le flux de sortie
    }
    
    public function connexionAdmin()
    {
        $this->init();
        require_once __DIR__.'/../vues/v_connexion.php';
        $view = ob_get_clean(); // récupère le contenu du flux et le vide
        return $view;           // retourne le flux 
    }

    public function verifierAdmin(Request $request, Application $app)
    {
        $this->init();
        session_start();
        $login = htmlentities($request->get('login'));
	    $mdp = htmlentities($request->get('mdp'));
	    $admin = $this->pdo->getInfosAdmin($login,$mdp);
	    if(!is_array($admin))
        {
            $app['couteauSuisse']->ajouterErreur("Login ou mot de passe incorrect");
            require_once __DIR__.'/../vues/v_erreurs.php';
            require_once __DIR__.'/../vues/v_connexion.php';
            $view = ob_get_clean();
        }
        else
        {
            $id = $admin['id'];
            $login = $admin['login'];
            $email = $admin['email'];
            $app['couteauSuisse']->connecter($id, $login, $email);
            $LesMenus = $this->pdo->getMenu();
            $LesContenus = $this->pdo->getContenus(1);
            $LesImages = $this->pdo->getImages(1);
            $menu = $this->pdo->getInfoMenu(1);
            $nomDuMenu = $menu['nomMenu'];
            $routeImage = 1;        //pour la route de l'image lors de la première visite sur le site ou après connexion + (../public)
            require_once __DIR__.'/../vues/v_entete.php';
            require_once __DIR__.'/../vues/v_bandeau.php';
            require_once __DIR__.'/../vues/v_texte.php';
            require_once __DIR__.'/../vues/v_pied.php';
            $view = ob_get_clean();
        }
        return $view;       
    }
}
?>