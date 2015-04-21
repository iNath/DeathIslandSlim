<?php

/**
 * Classe Connexion
 *
 * Singleton permettant de se connecter � la base de donn�e, utilis�e par toutes
 * les classes qui ont besoin d'un acc�s � la base de donn�e.
 * Il y a de renseigner � l'interieur:
 *
 * <ul>
 *
 * <li>le type de base de donn�e (mysql, sqllite, ...)</li>
 *
 * <li>le nom de la base de donn�e</li>
 *
 * <li>le login et le mot de passe utilisateur du serveur SQL</li>
 *
 * </ul>
 *
 * Cette classe ne permet que l'instanciation d'un objet PDO pour se connecter � la base de donn�e.
 * Vous pouvez utiliser cette classe comme ceci:
 *
 * <pre>
 *  $db = connexion::getInstance();
 *  $con = $db->getDbh();
 * </pre>
 *
 * @link http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 *
 * @author Benjamin Besse
 * @version 0.4
 * @package Connexion
 * @copyright Benjamin Besse
 * @todo
 *
 * <ul>
 *
 * <li>0.1: cr�ation de la classe Connexion</li>
 *
 * <li>0.2: passage de la classe en design patern singleton</li>
 *
 * <li>0.3: ajout de l'encodage par d�faut en UTF-8 � la lecture</li>
 *
 * <li>0.4: ajout d'un try cath pour la gestion d'erreur au niveau de la connexion � la base de donn�e</li>
 *
 * </ul>
 */
class DBConnexion
{
    /**
     * Instance de la classe connexion
     * @access private
     * @var connexion
     * @see getInstance
     */
    private static $instance;

    /**
     * Type de la base de donn�e.
     * @access private
     * @var string
     * @see __construct
     */
    private $type = "mysql";

    /**
     * Adresse du serveur h�te.
     * @access private
     * @var string
     * @see __construct
     */
    private $host = "localhost";

    /**
     * Nom de la base de donn�e.
     * @access private
     * @var string
     * @see __construct
     */
    private $dbname = "deathisland";

    /**
     * Nom d'utilisateur pour la connexion � la base de donn�es
     * @access private
     * @var string
     * @see __construct
     */
    private $username = "root";

    /**
     * Mot de passe pour la connexion � la base de donn�e
     * @access private
     * @var string
     * @see __construct
     */
    private $password = '';

    private $dbh;

    /**
     * Lance la connexion � la base de donn�e en le mettant
     * dans un objet PDO qui est stock� dans la variable $dbh
     * @access private
     */
    private function __construct()
    {
        try{
            $this->dbh = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
            );

            $req = "SET NAMES UTF8";
            $result = $this->dbh->prepare($req);
            $result->execute();
        }
        catch(PDOException $e){
            echo "<div class=\"error\">Erreur !: ".$e->getMessage()."</div>";
            die();
        }
    }

    /**
     * Regarde si un objet connexion a d�j� �t� instancier,
     * si c'est le cas alors il retourne l'objet d�j� existant
     * sinon il en cr�er un autre.
     * @return $instance
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Permet de r�cuprer l'objet PDO permettant de manipuler la base de donn�e
     * @return $dbh
     */
    public function getBdd()
    {
        return $this->dbh;
    }
}