<?php
    require("./templates/header.php");

    $controller = new CommentController();
    $comment = $controller->read($_GET["id"]);
    $articleId = $comment->getArticle_id();
    $controller->delete($_GET["id"]);
?>

<script>window.location.href="./read.php?id=<?= $articleId ?>"</script>
