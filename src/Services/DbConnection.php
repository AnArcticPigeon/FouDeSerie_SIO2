<?php

namespace App\Services;
use \PDO;
use \PDOException;

class DbConnection
{

    private static $serveur='mysql:host=192.168.4.1';
    private static $bdd='dbname=aburnett_FouDeSeries';   		
    private static $user='sqlaburnett' ;    		
    private static $mdp='savary' ;	
    private static $monPdo= null;
    private static $options = array(PDO::MYSQL_ATTR_SSL_CA => '', PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false);

private function __construct(){
}

/**
 * Fonction statique qui crée l'unique instance de la classe
 */
public  static function getPdoSeries(){
    if(is_null (DbConnection::$monPdo)) {
        try{
            DbConnection::$monPdo = new PDO(DbConnection::$serveur.';port=3306;'.DbConnection::$bdd, DbConnection::$user, DbConnection::$mdp, DbConnection::$options); 
            DbConnection::$monPdo->query("SET CHARACTER SET utf8");
            DbConnection::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
        }
        
    return DbConnection::$monPdo;  
}
}

?>