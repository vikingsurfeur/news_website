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

    echo "<script>window.location.href='./read.php?id={$_GET['id']}'</script>";
}
?>

<div class="container m-5 mx-auto">
    <h2 class="m-5"><?= $article->getTitle() ?></h2>
    <h6 class="m-5">Created at : <?= date('d/m/Y', strtotime($article->getDate())) ?></h6>
    <p class="h4 m-5"><?= $article->getContent() ?></p>
</div>

<div class="container">
    <form method="post">
        <label class="h3 m-5" for="content">Post a Todo Notification</label>
        <textarea class="form-control m-5" name="content" id="content" placeholder="Your content..." cols="20" rows="5"></textarea>
        <button type="submit" class="btn btn-success m-5">Post your Notification</button>
    </form>
</div>

<div class="container">
    <?php foreach ($comments as $comment): ?>
        <div class="m-5">
            <h5>Notification from <?= date('d/m/Y', strtotime($article->getDate())) ?></h5>
            <p class="h4 my-5"><?= $comment->getContent()?></p>
            <a href="./updateComment.php?id=<?= $comment->getId() ?>" class="btn btn-warning me-5">
                <i class="fas fa-edit "></i>
            </a>
            <a href="./deleteComment.php?id=<?= $comment->getId() ?>" class="btn btn-danger">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    <?php endforeach ?>
</div>


<?php
require_once './templates/footer.php';
?>
