<?php
require_once __DIR__.'/../modele/class_pdo.php';
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

//**************************************Contrôleur de première visite*****************//
Class ControleurStart
{
    private $pdo;
    private $idAdmin;
    private $login;
    private $email;
    
    public function __construct()
    {
        $this->pdo = PdoMC::getPdoMC();
        ob_start();             // démarre le flux de sortie
    }
    
    public function start(Application $app)
    {
        session_start();
        if($app['couteauSuisse']->estConnecte())
        {
            $this->idAdmin = $_SESSION['idAdmin'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
        }
        $LesMenus = $this->pdo->getMenus();
        $LesContenus = $this->pdo->getContenus(1);
        $LesImages = $this->pdo->getImages(1);
        $menu = $this->pdo->getInfoMenu(1);
        $message = $this->pdo->getMessage();
        $nomDuMenu = $menu['nomMenu'];
        $routeImage = 1;        //pour la route de l'image lors de la première visite sur le site + (../public)
        require_once __DIR__.'/../vues/v_entete.php';
        require_once __DIR__.'/../vues/v_bandeau.php';
        require_once __DIR__.'/../vues/v_message.php';
        require_once __DIR__.'/../vues/v_texte.php';
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean(); // récupère le contenu du flux et le vide
        return $view;           // retourne le flux 
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
        session_start();
        $this->init();
        $login = htmlentities($request->get('login'));
	    $mdp = htmlentities($request->get('mdp'));
	    $admin = $this->pdo->getInfosAdmin($login,$mdp);
	    if(!is_array($admin))
        {
            require_once __DIR__.'/../vues/v_erreurs.php';
            require_once __DIR__.'/../vues/v_connexion.php';
            $view = ob_get_clean();
        }
        else
        {
            $id = $admin['id'];
            $login = $admin['login'];
            $email = $admin['email'];
            $app['couteauSuisse']->connecter($id, $login, $email); //création de la session de l'admin
            $LesMenus = $this->pdo->getMenus();
            $LesContenus = $this->pdo->getContenus(1);
            $LesImages = $this->pdo->getImages(1);
            $menu = $this->pdo->getInfoMenu(1);
            $message = $this->pdo->getMessage();
            $nomDuMenu = $menu['nomMenu'];
            $routeImage = 1;        //pour la route de l'image lors de la première visite sur le site ou après connexion + (../public)
            require_once __DIR__.'/../vues/v_entete.php';
            require_once __DIR__.'/../vues/v_bandeau.php';
            require_once __DIR__.'/../vues/v_message.php';
            require_once __DIR__.'/../vues/v_texte.php';
            require_once __DIR__.'/../vues/v_pied.php';
            $view = ob_get_clean();
        }
        return $view;       
    }

    public function deconnexionAdmin(Application $app)
    {
        $app['couteauSuisse']->deconnecter();
        $app['couteauSuisse']->Logout();
        return $app->redirect('index.php');       
    }
}
//**************************************Contrôleur des différentes catégories d'affichage*****************//

Class ControleurAffichage 
{
    private $pdo;
    private $idAdmin;
    private $login;
    private $email;

    public function init(Application $app)
    {
        $this->pdo = PdoMC::getPdoMC();
        session_start();
        if($app['couteauSuisse']->estConnecte())
        {
            $this->idAdmin = $_SESSION['idAdmin'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
        }
        ob_start();             // démarre le flux de sortie
        $LesMenus = $this->pdo->getMenus();
        require_once __DIR__.'/../vues/v_entete.php';
    }

    public function affichage(Request $request, Application $app)
    {
        $this->init($app);
        $message = $this->pdo->getMessage();
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
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'T':
                $LesContenus = $this->pdo->getContenus($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'P':
                $LesProfs = $this->pdo->getProf();
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_prof.php';
                break;
            case 'G':
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_galerie_photo.php';
                break;
            case 'N':
                $LesContenus = $this->pdo->getNews($idMenu);
                $LesImages = $this->pdo->getImages($idMenu);
                require_once __DIR__.'/../vues/v_bandeau.php';
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_news.php';
                break;
            case 'C':
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_contact.php';
                break;
        }
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }
}
//**************************************Contrôleur des différentes actions de l'admin*****************//

Class ControleurActionsAdmin 
{
    private $pdo;
    private $idAdmin;
    private $login;
    private $email;

    // public function init(Application $app)
    // {
    //     $this->pdo = PdoMC::getPdoMC();
    //     session_start();
    //     if($app['couteauSuisse']->estConnecte())
    //     {
    //         $this->idAdmin = $_SESSION['idAdmin'];
    //         $this->login = $_SESSION['login'];
    //         $this->email = $_SESSION['email'];
    //         ob_start();             // démarre le flux de sortie
    //         $LesMenus = $this->pdo->getMenus();
    //         require_once __DIR__.'/../vues/v_entete.php';
    //     }
    //     else
    //     {
    //         ob_start();             // démarre le flux de sortie
    //         $response = new response ();
    //         $response->setContent ( 'Connexion nécessaire' );
    //         return $response;
    //     }
    // }

    public function init(Application $app)
    {
        $this->pdo = PdoMC::getPdoMC();
        session_start();
        if($app['couteauSuisse']->estConnecte())
        {
            $this->idAdmin = $_SESSION['idAdmin'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
        }
        ob_start();             // démarre le flux de sortie
        $LesMenus = $this->pdo->getMenus();
        require_once __DIR__.'/../vues/v_entete.php';
    }

    public function modifierContenu(Request $request, Application $app)
    {
        $this->init($app);
        $idContenu = $request->get('id');echo $idContenu;
        $leContenu = $this->pdo->getContenu($idContenu);
        $idMenu = $this->pdo->getMenu($idContenu); //définir l'id du menu où on modifie le contenu afin d'y être redirigé
        $menu = $this->pdo->getInfoMenu($idMenu);
        $nomDuMenu = $menu['nomMenu'];
        require_once __DIR__.'/../vues/v_modifierContenu.php';
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }

    public function validerModif(Request $request, Application $app)
    {
        $this->init($app);
        $idContenu = $request->get('idContenu');
        $idMenu = $request->get('idMenu');
        $titre = htmlentities($request->get('titre'));
	    $leContenu = htmlentities($request->get('leContenu'));
        $this->pdo->modifierContenu($idContenu, $titre, $leContenu);
        $app->redirect('/afficher/$idMenu');
    }
}
?>