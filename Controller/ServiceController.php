<?php


abstract class ServiceController
{
    protected PDO $pdo;
    protected static $instance = null;

    /**
     * Controller constructor
     */
    public function __construct()
    {
        $dbName = 'news_website';
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';

        if (self::$instance === null)
        {
            try {
                $instance = $this->setPdo(
                    new PDO('mysql:host='.$dbHost.';dbname='.$dbName.'', $dbUsername, $dbPassword));
            } catch (PDOException $error) {
                file_put_contents('dblogs.log',$error->getMessage() . PHP_EOL, FILE_APPEND);
                echo 'Une erreur de connexion à la base de donnée est survenue';
                die();
            }
        }

        return $instance;
    }
}