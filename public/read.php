<?php
require_once './templates/header.php';

$articleController = new ArticleController();
$article = $articleController->read($_GET["id"]);

$commentController = new CommentController();
$comments = $commentController->readAllByArticleId($_GET["id"]);

if ($_POST)
{
    $comment = new Comment([
        "content" => $_POST["content"],
        "article_id" => $_GET["id"],
    ]);

    $commentController->create($comment);

    echo "<script>window.location.href='/read?id.php'</script>";
}
?>

<div class="container m-5 mx-auto">
    <h2 class="m-5"><?= $article->getTitle() ?></h2>
    <h5 class="m-5">Publié le : <?= date('d/m/Y', strtotime($article->getDate())) ?></h5>
    <p class="m-5"><?= $article->getContent() ?></p>
</div>

<div class="container">
    <form method="post">
        <label class="h3 m-5" for="content">Poster un commentaire</label>
        <textarea class="form-control m-5" name="content" id="content" placeholder="Votre commentaire..." cols="20" rows="5"></textarea>
        <button type="submit" class="btn btn-success m-5">Poster votre commentaire</button>
    </form>
</div>

<div class="container">
    <?php foreach ($comments as $comment): ?>
        <div class="m-5">
            <h5>Commentaire du <?= date('d/m/Y', strtotime($article->getDate())) ?></h5>
            <p><?= $comment->getContent()?></p>
        </div>
    <?php endforeach ?>
</div>


<?php
require_once './templates/footer.php';
?>
