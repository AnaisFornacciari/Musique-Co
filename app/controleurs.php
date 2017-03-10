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
        $pied = $this->pdo->getPied();
        $nomDuMenu = $menu['nomMenu'];
        $idMenu = 1;
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
            $pied = $this->pdo->getPied();
            $nomDuMenu = $menu['nomMenu'];
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
        $pied = $this->pdo->getPied();
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
                $LesProfs = $this->pdo->getProfs();
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_prof.php';
                break;
            case 'G':
                $LesImages = $this->pdo->getImages($idMenu);
                $LesAudios = $this->pdo->getAudios($idMenu);
                require_once __DIR__.'/../vues/v_message.php';
                require_once __DIR__.'/../vues/v_galerie_photo.php';
                require_once __DIR__.'/../vues/v_galerie_audio.php';
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

    public function ajouterContenu(Request $request, Application $app)
    {
        $this->init($app);
        require_once __DIR__.'/../vues/v_ajouter_modifierContenu.php';
        $view = ob_get_clean();
        return $view;
    }

    public function ajouterProf(Request $request, Application $app)
    {
        $this->init($app);
        require_once __DIR__.'/../vues/v_ajouter_modifierProf.php';
        $view = ob_get_clean();
        return $view;
    }

    public function ajouterImage(Request $request, Application $app)
    {
        $this->init($app);
        require_once __DIR__.'/../vues/v_ajouterImage.php';
        $view = ob_get_clean();
        return $view;
    }

    public function ajouterVideo(Request $request, Application $app)
    {
        $this->init($app);
        require_once __DIR__.'/../vues/v_ajouterVideo.php';
        $view = ob_get_clean();
        return $view;
    }

    public function ajouterAudio(Request $request, Application $app)
    {
        $this->init($app);
        require_once __DIR__.'/../vues/v_ajouterAudio.php';
        $view = ob_get_clean();
        return $view;
    }
    
    public function supprimerContenu(Request $request, Application $app)
    {
        $this->init($app);
        $idContenu = $request->get('id');
        $this->pdo->supprimerContenu($idContenu);
        $app->redirect('/musique&co/public/afficher-'.$idMenu);
        $view = ob_get_clean();
        return $view;
    }

    public function supprimerProf(Request $request, Application $app)
    {
        $this->init($app);
        $idProf = $request->get('id');
        $this->pdo->supprimerProf($idProf);
        $app->redirect('/musique&co/public/afficher-13');
        $view = ob_get_clean();
        return $view;
    }

    public function supprimerImage(Request $request, Application $app)
    {
        $this->init($app);

        $view = ob_get_clean();
        return $view;
    }

    public function supprimerVideo(Request $request, Application $app)
    {
        $this->init($app);

        $view = ob_get_clean();
        return $view;
    }

    public function supprimerAudio(Request $request, Application $app)
    {
        $this->init($app);

        $view = ob_get_clean();
        return $view;
    }

    public function modifierContenu(Request $request, Application $app)
    {
        $this->init($app);
        $idContenu = $request->get('id');
        $leContenu = $this->pdo->getContenu($idContenu);
        $idMenu = $this->pdo->getMenu($idContenu);
        $menu = $this->pdo->getInfoMenu($idMenu);
        $nomDuMenu = $menu['nomMenu'];
        require_once __DIR__.'/../vues/v_ajouter_modifierContenu.php';
        $view = ob_get_clean();
        return $view;
    }

    public function modifierProf(Request $request, Application $app)
    {
        $this->init($app);
        $idProf = $request->get('id');
        $leProf = $this->pdo->getProf($idProf);
        require_once __DIR__.'/../vues/v_ajouter_modifierProf.php';
        $view = ob_get_clean();
        return $view;
    }

    public function modifierMessage(Application $app)
    {
        $this->init($app);
        $message = $this->pdo->getMessage();
        require_once __DIR__.'/../vues/v_modifierMessage.php';
        $view = ob_get_clean();
        return $view;
    }

    public function modifierPied(Application $app)
    {
        $this->init($app);
        $pied = $this->pdo->getPied();
        require_once __DIR__.'/../vues/v_modifierPied.php';
        $view = ob_get_clean();
        return $view;
    }

    public function validerAjoutContenu(Request $request, Application $app)
    {
        $this->init($app);
        $idMenu = $request->get('id');
        $titre = htmlentities($request->get('titre'));
	    $contenu = htmlentities($request->get('contenu'));
        $this->pdo->ajouterContenu($idMenu, $titre, $contenu);
        $app->redirect('/musique&co/public/afficher-'.$idMenu);
        $view = ob_get_clean();
        return $view;
    }

    public function validerAjoutProf(Request $request, Application $app)
    {
        $this->init($app);
        $nom = htmlentities($request->get('nom'));
        $prenom = htmlentities($request->get('prenom'));
        $discipline = htmlentities($request->get('discipline'));
        $image = $request->get('image');
        $this->pdo->ajouterProf($nom, $prenom, $discipline, "../public/images/profs/".$image);
        $app->redirect('/musique&co/public/afficher-13');
        $view = ob_get_clean();
        return $view;
    }

    public function validerModifContenu(Request $request, Application $app)
    {
        $this->init($app);
        $idContenu = $request->get('id');
        $idMenu = $this->pdo->getMenu($idContenu); //définir l'id du menu où on modifie le contenu afin d'y être redirigé
        $titre = htmlentities($request->get('titre'));
	    $contenu = htmlentities($request->get('contenu'));
        $this->pdo->modifierContenu($idContenu, $titre, $contenu);
        $app->redirect('/afficher-'.$idMenu);
        $view = ob_get_clean();
        return $view;
    }

    public function validerModifProf(Request $request, Application $app)
    {
        $this->init($app);
        $idProf = $request->get('id');
        $nom = htmlentities($request->get('nom'));
        $prenom = htmlentities($request->get('prenom'));
        $discipline = htmlentities($request->get('discipline'));
        $image = $request->get('image');
        $this->pdo->modifierProf($idProf, $nom, $prenom, $discipline, "../public/images/profs/".$image);
        return $app->redirect('afficher-13');
    }

    public function validerModifMessage(Request $request, Application $app)
    {
        $this->init($app);
        $titre = htmlentities($request->get('titre'));
	    $contenu = htmlentities($request->get('contenu'));
        $this->pdo->modifierMessage($titre, $contenu);
        $app->redirect('/afficher-1');
        $view = ob_get_clean();
        return $view;
    }

    public function validerModifPied(Request $request, Application $app)
    {
        $this->init($app);
	    $contenu = htmlentities($request->get('contenu'));
        $this->pdo->modifierPied($contenu);
        $app->redirect('/afficher-1');
        $view = ob_get_clean();
        return $view;
    }

    public function modifierMenu(Application $app)
    {
        $this->init($app);
        $lesMenus = $this->pdo->getMenus();
        require_once __DIR__.'/../vues/v_modifierMenu.php';
        $view = ob_get_clean();
        return $view;
    }
}
?>