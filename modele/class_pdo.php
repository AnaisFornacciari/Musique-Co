<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour le site Musique & Co
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoMC qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
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
    
    public static function getMenu()
    {
        $req = "select * from menu order by classement;";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getSousMenu($nomMenu)
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
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    public static function getInfoMenu($idMenu)
    {
        $req = "select * from menu where id = '$idMenu';";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    public static function getContenus($idMenu)
    {
        $req = "select * from contenu where idMenu = '$idMenu' order by id";
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
}
?>