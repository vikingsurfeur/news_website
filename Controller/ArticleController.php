<?php


class ArticleController
{
    private string $pdo;
    private string $dbName = 'news_website';
    private string $dbHost = 'localhost';
    private string $dbUser = 'root';
    private string $dbPass = '';

    /**
     * ArticleController constructor.
     * @param string $pdo
     * @param string $dbName
     * @param string $dbHost
     * @param string $dbUser
     * @param string $dbPass
     */
    public function __construct(string $dbName, string $dbHost, string $dbUser, string $dbPass)
    {
        $this->setPdo(new PDO("mysql:host=$dbHost;dbname=$dbName, $dbUser, $dbPass"));
    }
}