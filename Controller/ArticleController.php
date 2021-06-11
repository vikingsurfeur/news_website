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
     * @param string $dbName
     * @param string $dbHost
     * @param string $dbUser
     * @param string $dbPass
     */
    public function __construct(string $dbName, string $dbHost, string $dbUser, string $dbPass)
    {
        $this->setPdo(new PDO("mysql:host=$dbHost;dbname=$dbName, $dbUser, $dbPass"));
    }

    /**
     * @param string
     * @return self
     */
    public function setPdo(string $pdo): self
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * @param Article $article
     * create method
     */
    public function create(Article $article)
    {
        $req = $this->pdo->prepare("INSERT INTO `articles` (title, content) VALUES (:title, :content)");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * @param Article $article
     * update method
     */
    public function update(Article $article)
    {
        $req = $this->pdo->prepare("UPDATE `articles` SET title = :title, content = :content WHERE id = :id");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param int $id
     * delete method
     */
    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `article` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param int $id
     * @return Article
     * read method
     */
    public function read(int $id): Article
    {
        $req = $this->pdo->prepare("SELECT * FROM `article` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $data = $req->fetch();

        return new Article($data);
    }

    /**
     * @param int $id
     * @return array
     * read all method
     */
    public function readAll(int $id): array
    {
        $articles = [];

        $req = $this->pdo->query("SELECT * FROM `article` ORDER BY id DESC");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        foreach($req->fetchAll() as $data)
        {
            $article[] = new Article($data);
        }

        return $articles;
    }
}