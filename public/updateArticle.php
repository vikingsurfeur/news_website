<?php

require_once './templates/header.php';

$controller = new ArticleController();
$article = $controller->read($_GET["id"]);

// Modifying article
if ($_POST)
{
    $article->hydrate($_POST);
    $controller->update($article);

    echo "<script>window.location.href='index.php'</script>";
}
?>

<div class="container">
    <h3 class="m-5">Modification de l'article : <?= $article->getTitle() ?> </h3>
    <form method="POST">
        <div class="form-group m-5">
            <label for="title">Modification du titre</label>
            <input class="form-control" type="text" id="title" name="title" value="<?= $article->getTitle() ?>">
        </div>
        <div class="form-group m-5">
            <label for="content">Modification du contenu</label>
            <textarea class="form-control" type="text" id="content" name="content" cols="20" rows="5" ><?= $article->getContent() ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning m-5">Publier la modification</button>
    </form>
</div>

<?php

require_once './templates/footer.php';

?>
