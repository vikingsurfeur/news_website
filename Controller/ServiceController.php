<?php


abstract class ServiceController
{
    protected PDO $pdo;
    protected static $instance = null;

    /**
     * ArticleController constructor
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
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        return $instance;
    }
}