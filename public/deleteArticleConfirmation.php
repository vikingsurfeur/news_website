<?php
    require("./templates/header.php");

    $controller = new ArticleController();
    $article = $controller->read($_GET["id"]);
    $articleTitle = substr($article->getTitle(), 0, 40);

    echo "<script>
                const result = window.confirm
                    (`Are you sure to delete this todo ?\n{$articleTitle}...`);
                
                result ? 
                window.location.href='./deleteArticle.php?id={$_GET["id"]}' :
                window.location.href='./index.php';
              </script>";
