<?php
    require("./templates/header.php");

    $controller = new CommentController();
    $controller->delete($_GET["id"]);
?>

<script>window.location.href="./index.php"</script>
