<?php


class CommentController extends ServiceController
{
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
        $req = $this->pdo->prepare("INSERT INTO `article` (title, content, priority) VALUES (:title, :content, :priority)");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":priority", $article->getPriority(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param Article $article
     * update method
     */
    public function update(Article $article)
    {
        $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content, date = :date, priority = :priority WHERE id = :id");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":date", $article->getDate(), PDO::PARAM_STR);
        $req->bindValue(":priority", $article->getPriority(), PDO::PARAM_INT);
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
     * @return array
     * read all method by date
     */
    public function readAllByDate(): array
    {
        $articles = [];

        $req = $this->pdo->query("SELECT * FROM `article` ORDER BY date DESC");

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = new Article($data);
        }

        return $articles;
    }

    /**
     * @return array
     * read all method by priority
     */
    public function readAllByPriority(): array
    {
        $articles = [];

        $req = $this->pdo->query("SELECT * FROM `article` ORDER BY priority DESC");

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $articles[] = new Article($data);
        }

        return $articles;
    }
}