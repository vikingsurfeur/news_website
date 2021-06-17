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
     * @param Comment $comment
     * create method
     */
    public function create(Comment $comment)
    {
        $req = $this->pdo->prepare("INSERT INTO `comment` (content, article_id) VALUES (:content, :article_id)");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(':article_id', $comment->getArticle_id(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param Comment $comment
     * update method
     */
    public function update(Comment $comment)
    {
        $req = $this->pdo->prepare("UPDATE `comment` SET content = :content, date = :date, article_id = :article_id WHERE id = :id");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":date", $comment->getDate(), PDO::PARAM_STR);
        $req->bindValue(":id", $comment->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param int $id
     * delete method
     */
    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `comment` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * @param int $id
     * @return Comment
     * read method
     */
    public function read(int $id): Comment
    {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE id = $id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch();

        return new Comment($data);
    }

    /**
     * @param int $articleId
     * @return array
     * read all method by date
     */
    public function readAllByArticleId(int $articleId): array
    {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE article_id = :article_id ORDER BY id DESC");
        $req->bindValue(":article_id", $articleId, PDO::PARAM_INT);
        $req->execute();

        $comments = [];

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }

        return $comments;
    }
}