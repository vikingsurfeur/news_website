<?php

require_once './templates/header.php';

$controller = new ArticleController();

?>

<div class="container">
    <h3 class="m-5">Création de l'article</h3>
    <form method="POST">
        <div class="form-group m-5">
            <label for="title">Modification du titre</label>
            <input class="form-control" type="text" id="title" name="title" value="<?= $article->setTitle() ?>">
        </div>
        <div class="form-group m-5">
            <label for="content">Modification du contenu</label>
            <textarea class="form-control" type="text" id="content" name="content" cols="20" rows="5" ><?= $article->setContent() ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning m-5">Publier l'article'</button>
    </form>
</div>

<?php

require_once './templates/footer.php';

?>
