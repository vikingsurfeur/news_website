<?php
    require("./templates/header.php");

    $controller = new CommentController();
    $comment = $controller->read($_GET["id"]);
    $articleId = $comment->getArticle_id();
    $commentContent = substr($comment->getContent(), 0,40);

    echo "<script>
            const result = window.confirm
                (`Are you sure to delete this comment ?\n{$commentContent}...`);
            
            result ? 
            window.location.href='./deleteComment.php?id={$_GET["id"]}' :
            window.location.href='./read.php?id={$articleId}';
          </script>";
