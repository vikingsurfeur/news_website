<?php
    require_once './templates/header.php';

    $controller = new ArticleController();
    $article = $controller->read($_GET["id"]);

    // Modifying article
    if ($_POST)
    {
        isset($_POST['priority']) ? $_POST['priority'] = 1 : $_POST['priority'] = 0;

        $article->hydrate($_POST);
        $controller->update($article);

        echo "<script>window.location.href='index.php'</script>";
    }
?>

<div class="container">
    <h3 class="m-5">Modify your Todo : <?= $article->getTitle() ?> </h3>
    <form method="POST">
        <div class="form-group m-5">
            <label class="h5" for="title">Todo Title</label>
            <input class="form-control mt-3" type="text" id="title" name="title" value="<?= $article->getTitle() ?>">
        </div>
        <div class="form-group m-5">
            <label class="h5" for="content">Todo Content</label>
            <textarea class="form-control mt-3" type="text" id="content" name="content" cols="20" rows="5" ><?= $article->getContent() ?></textarea>
        </div>
        <div class="form-check m-5">
            <label class="form-check-label h6" for="priority">
                Most Important Todo ?
            </label>
            <input class="form-check-input" type="checkbox" id="priority" name="priority">
        </div>
        <button type="submit" class="btn btn-warning m-5">Modify your Todo</button>
    </form>
</div>

<?php
    require_once './templates/footer.php';
?>
