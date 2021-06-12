<?php


class ArticleController
{
    private PDO $pdo;

    /**
     * ArticleController constructor
     */
    public function __construct()
    {
        $dbName = 'news_website';
        $dbHost = 'localhost';

        try {
            $this->setPdo(new PDO('mysql:host='.$dbHost.';dbname='.$dbName.'', 'root', ''));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * @param PDO
     * @return self
     */
    public function setPdo(PDO $pdo): self
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
        $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content WHERE id = :id");

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
        $req = $this->pdo->query("SELECT * FROM `article` WHERE id = $id");

        // prepare it's not working, give a query method
        // $req->bindValue(":id", $id, PDO::PARAM_INT);
        $data = $req->fetch();

        return new Article($data);
    }

    /**
     * @param int $id
     * @return array
     * read all method
     */
    public function readAll(): array
    {
        $articles = [];

        $req = $this->pdo->query("SELECT * FROM `article` ORDER BY id DESC");

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = new Article($data);
        }

        return $articles;
    }
}