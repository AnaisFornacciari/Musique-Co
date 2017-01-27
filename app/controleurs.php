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
        $pdo = PdoMC::getPdoMC();
        $contenu = $pdo->getContenu(1);
        $menu = $pdo->getInfoMenu(1);
        $nomMenu = $menu['nomMenu'];
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

    public function affichage(Request $request, Application $app)
    {
        $this->init();
        $id = $request->get('id');
        $menu = $this->pdo->getInfoMenu($id);
        if(!$menu['sousMenu'])
        {
            $nomMenu = $menu['nomMenu'];
        }
        else
        {
            $nomMenu = $menu['nomSousMenu'];
        }
        $categ = $menu['categ'];
        switch ($categ) 
        {
            case 'T':
                $contenu = $this->pdo->getContenu($id);
                $image = $this->pdo->getImage($id);
                require_once __DIR__.'/../vues/v_texte.php';
                break;
            case 'P':
                $prof = $this->pdo->getProf();
                require_once __DIR__.'/../vues/v_prof.php';
                break;
            case 'E':
                $contenu = $this->pdo->getContenu($id);
                $image = $this->pdo->getImage($id);
                require_once __DIR__.'/../vues/v_tarif.php';
                break;
            case 'G':
                $image = $this->pdo->getImage($id);
                require_once __DIR__.'/../vues/v_galerie.php';
                break;
            case 'N':
                $contenu = $this->pdo->getContenu($id);
                $image = $this->pdo->getImage($id);
                require_once __DIR__.'/../vues/v_news.php';
                break;
            case 'C':
                $contenu = $this->pdo->getContenu($id);
                require_once __DIR__.'/../vues/v_contact.php';
                break;
        }
        require_once __DIR__.'/../vues/v_pied.php';
        $view = ob_get_clean();
        return $view;
    }
}
?>