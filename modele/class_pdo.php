<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour le site Musique & Co
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoMC qui contiendra l'unique instance de la classe

 */

class PdoMC
{   		
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=musique&co';   		
    private static $user='root' ;    		
    private static $mdp='root' ;	
    private static $monPdo;
    private static $monPdoMC=null;
    
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
    private function __construct()
    {
        PdoMC::$monPdo = new PDO(PdoMC::$serveur.';'.PdoMC::$bdd, PdoMC::$user, PdoMC::$mdp); 
        PdoMC::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct()
    {
        PdoMC::$monPdo = null;
    }
        
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoMC = PdoMC::getPdoMC();
 
 * @return l'unique objet de la classe PdoMC
 */
    public  static function getPdoMC()
    {
        if(PdoMC::$monPdoMC==null)
        {
	        PdoMC::$monPdoMC= new PdoMC();
        }
        return PdoMC::$monPdoMC;  
    }
    
    public static function getPied()
    {
        $req = "select * from pied";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
    }
    public static function getMenus()
    {
        $req = "select * from menu order by classement;";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    
    public static function getMenu($idContenu)
    {
        $req = PdoMC::$monPdo->prepare("select idMenu from contenu where id = :id");
        $req->bindParam(':id', $idContenu);
        $req->execute();
        $ligne = $req->fetch();
        return $ligne;
    }

    public static function getSousMenus($nomMenu)
    {
        $req = "select * from menu where nomMenu = '$nomMenu' and sousMenu = false order by classement;";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getCategorie($idMenu)
    {
        $req = "select categ from menu where id = '$idMenu';";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
    }

    public static function getInfoMenu($idMenu)
    {
        $req = "select * from menu where id = '$idMenu';";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
    }

    public static function getContenus($idMenu)
    {
        $req = "select * from contenu where idMenu = '$idMenu' order by id";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getContenu($idContenu)
    {
        $req = "select * from contenu where id = '$idContenu'";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
    }

    public static function getNews($idMenu)
    {
        $req = "select * from contenu where idMenu = '$idMenu' order by dateAjout desc";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getImages($idMenu)
    {
        $req = "select * from image where idMenu = '$idMenu' order by id";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getProf()
    {
        $req = "select * from prof order by id";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getMessage()
    {
        $req = "select * from message";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
    }

    public static function getInfosAdmin($login,$mdp)
    {
        $req = PdoMC::$monPdo->prepare("select * from admin where admin.login= :login and admin.mdp= :mdp");
        $req->bindParam(':login', $login);
        $req->bindParam(':mdp', $mdp);
        $req->execute();
        $ligne = $req->fetch();
        return $ligne;
    }

    public static function modifierContenu($idContenu, $titre, $leContenu)
    {
        $req = PdoMC::$monPdo->prepare("update contenu set titre = :titre and leContenu :leContenu where id = '$idContenu'");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':leContenu', $leContenu);
        // insertion d'une ligne
        $req->execute();
    }

    public static function modifierImage($idImage, $lImage)
    {
        $req = PdoMC::$monPdo->prepare("update image set lImage = :lImage where id = '$idImage'");
        $req->bindParam(':lImage', $lImage);
        // insertion d'une ligne
        $req->execute();
    }
}
?>