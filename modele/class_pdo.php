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

    public static function getAudios($idMenu)
    {
        $req = "select * from audio where idMenu = '$idMenu' order by id";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getProfs()
    {
        $req = "select * from prof order by id";
        $res = PdoMC::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function getProf($idProf)
    {
        $req = "select * from prof where id = '$idProf'";
        $res = PdoMC::$monPdo->query($req);
        $ligne = $res->fetch();
        return $ligne;
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

    public static function ajouterContenu($idMenu, $titre, $leContenu)
    {
        $req = PdoMC::$monPdo->prepare("insert into contenu (titre, leContenu, dateAjout, dateModif, idMenu) values ( :titre, :leContenu, NOW(), NOW(), '$idMenu' )");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':leContenu', $leContenu);
        // insertion d'une ligne
        $req->execute();
    }

    public static function ajouterProf($nom, $prenom, $discipline, $image)
    {
        $req = PdoMC::$monPdo->prepare("insert into prof (nom, prenom, discipline, image, dateAjout, dateModif) values ( :nom, :prenom, :discipline, '$image', NOW(), NOW() )");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':discipline', $discipline);
        // insertion d'une ligne
        $req->execute();
    }

    public static function ajouterImage($idMenu, $image)
    {
        $req = "insert into image (lImage, dateAjout, idMenu) values ( '$image', NOW(), '$idMenu' )";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function ajouterAudio($idMenu, $audio)
    {
        $req = "insert into image (lien, dateAjout) values ( '$audio', NOW(), '$idMenu' )";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function supprimerContenu($idContenu)
    {
        $req = "delete from contenu where id = '$idContenu'";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function supprimerProf($idProf)
    {
        $req = "delete from prof where id = '$idProf'";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function supprimerImage($idImage)
    {
        $req = "delete from image where id = '$idImage'";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function supprimerAudio($idAudio)
    {
        $req = "delete from audio where id = '$idAudio'";
        $res = PdoMC::$monPdo->query($req);
    }

    public static function modifierContenu($idContenu, $titre, $leContenu)
    {
        $req = PdoMC::$monPdo->prepare("update contenu set titre = :titre , leContenu :leContenu , dateModif = NOW() where id = '$idContenu'");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':leContenu', $leContenu);
        // insertion d'une ligne
        $req->execute();
    }

    public static function modifierProf($idProf, $nom, $prenom, $discipline, $image)
    {
        $req = PdoMC::$monPdo->prepare("update prof set nom = :nom , prenom :prenom , discipline = :discipline , image = :image , dateModif = NOW() where id = '$idProf'");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':discipline', $discipline);
        $req->bindParam(':image', $image);
        // insertion d'une ligne
        $req->execute();
    }

    public static function modifierMessage($titre, $contenu)
    {
        $req = PdoMC::$monPdo->prepare("update message set titre = :titre , contenu :contenu , dateModif = NOW()");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':libelle', $libelle);
        // insertion d'une ligne
        $req->execute();
    }

    public static function modifierPied($contenu)
    {
        $req = PdoMC::$monPdo->prepare("update pied set contenu = :contenu , dateModif = NOW()");
        $req->bindParam(':contenu', $contenu);
        // insertion d'une ligne
        $req->execute();
    }

    public static function modifierImage($idImage, $lImage)
    {
        $req = PdoMC::$monPdo->prepare("update image set lImage = :lImage , dateModif = NOW() where id = '$idImage'");
        $req->bindParam(':lImage', $lImage);
        // insertion d'une ligne
        $req->execute();
    }
}
?>