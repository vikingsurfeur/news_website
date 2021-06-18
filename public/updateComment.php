<?php
    require("./templates/header.php");

    $controller = new CommentController();
    $comment = $controller->read($_GET["id"]);
    $articleId = $comment->getArticle_id();

    if ($_POST) {
        $comment->hydrate([
            "content" => $_POST["content"],
            "article_id" => $_GET["id"]
        ]);
        $controller->update($comment);

        echo "<script>window.location.href='./read.php?id={$articleId}'</script>";
    }
?>

<div class="container">
    <form method="post">
        <label class="h3 m-5" for="content">Modify your Notification</label>
        <textarea name="content" id="content" placeholder="Votre commentaire" class="form-control m-5" cols="20" rows="5"><?= $comment->getContent() ?></textarea>
        <button type="submit" class="btn btn-success m-5">Modify your Notification</button>
    </form>
</div>

<?php
require_once './templates/footer.php';
?>

