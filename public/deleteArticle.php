<?php
    require_once './templates/header.php';

    $controller = new ArticleController();
    $controller->delete($_GET['id']);
?>

<script>window.location.href="index.php"</script>