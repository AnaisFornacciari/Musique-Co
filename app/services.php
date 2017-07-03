<?php
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

Class CouteauSuisse
{
    /**
     * Enregistre dans une variable session les infos d'un admin

     * @param $id
     * @param $login
     * @param $email
     */
        public function connecter($id,$login,$email)
        {
            $_SESSION['idAdmin']= $id;
            $_SESSION['login']= $login;
            $_SESSION['email']= $email;
        }

      /**
     * Teste si l'admin est connecté
     * @return vrai ou faux 
     */
        public function estConnecte()
        {
            return isset($_SESSION['idAdmin']);
        }

     /**
     * Détruit la session active
     */
        public function Logout()
        {
            $_SESSION = array ();
            if (ini_get ( "session.use_cookies" ))
            {
                $params = session_get_cookie_params ();
                setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
            }
            session_destroy ();
            session_start();
            $_SESSION ['result'] = " ";
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

}

/*------------------------Fin classe---------------------------*/

/*------------------------Création du service--------------------*/

$app['couteauSuisse'] = function ()
{
    return new CouteauSuisse();
};