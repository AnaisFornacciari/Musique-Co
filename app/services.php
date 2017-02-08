<?php
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

Class CouteauSuisse
{
    /**
     * Enregistre dans une variable session les infos d'un admin

     * @param $id 
     * @param $nom
     * @param $prenom
     */
        public function connecter($id,$nom,$prenom)
        {
            $_SESSION['idAdmin']= $id; 
            $_SESSION['nom']= $nom;
            $_SESSION['prenom']= $prenom;
        }

      /**
     * Teste si un quelconque admin est connecté
     * @return vrai ou faux 
     */
        public  function estConnecte()
        {
            return isset($_SESSION['idAdmin']);
        }

     /**
     * Détruit la session active
     */
        public function deconnecter()
        {
            session_destroy();
        }


     /**
     * Tronque une chaine de caractère sans couper un mot avec une taille définis
     * string - La chaîne d'entrée.
     * max_length - Longueur maximale de la chaine retournée.
     * replacement - Texte de remplacement.
     * trunc_at_space - Si ce paramètre vaut TRUE, truncate() tentera de ne pas tronquer la chaine au milieu d'un mot.
     * Valeurs de retour : string (chaîne tronquée)
     */
     	public function truncate($string, $max_length, $replacement, $trunc_at_space)
        {
            $max_length -= strlen($replacement);
            $string_length = strlen($string);
            
            if($string_length <= $max_length)
                return $string;
            
            if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
                $max_length = $space_position;
            
            return substr_replace($string, $replacement, $max_length);
        }

    /**
     * Ajoute le libellé d'une erreur au tableau des erreurs 

     * @param $msg : le libellé de l'erreur 
     */
        function ajouterErreur($msg){
           if (! isset($_REQUEST['erreurs']))
            {
              $_REQUEST['erreurs']=array();
            } 
           $_REQUEST['erreurs'][]=$msg;
        }

    /**
     * Retoune le nombre de lignes du tableau des erreurs 

     * @return le nombre d'erreurs
     */
        function nbErreurs()
        {
           if (!isset($_REQUEST['erreurs']))
            {
                return 0;
            }
            else
            {
                return count($_REQUEST['erreurs']);
            }
        }
        
    /**
     * Ajoute le libellé d'un "sucess" au tableau des "sucess" 

     * @param $msg : le libellé du "sucess"
     */
        function ajouterSucess($msg){
           if (! isset($_REQUEST['sucess']))
            {
              $_REQUEST['sucess']=array();
            } 
           $_REQUEST['sucess'][]=$msg;
        }
        
    /**
     * Retoune le nombre de lignes du tableau des "sucess"

     * @return le nombre de "sucess"
     */
        function nbSucess()
        {
           if (!isset($_REQUEST['sucess']))
            {
                return 0;
            }
            else
            {
                return count($_REQUEST['sucess']);
            }
        } 

        function Logout()
        {
            $_SESSION = array ();
            if (ini_get ( "session.use_cookies" ))
            {
                $params = session_get_cookie_params ();
                setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
            }
            session_destroy ();
            session_start ();
            $_SESSION ['result'] = " ";
        }
}

/*------------------------Fin classe---------------------------*/

/*------------------------Création du service--------------------*/

$app['couteauSuisse'] = function ()
{
    return new CouteauSuisse();
};