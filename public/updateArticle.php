<?php

require_once './templates/header.php';

$controller = new ArticleController();
$article = $controller->read($_GET['id']);

?>

<div class="container m-2">
    <h3>Modification de l'article : <?= $article->getTitle() ?></h3>
    <form>
        <div class="form-group">
            <label for="title">Modification du titre</label>
            <input type="text"
                   class="form-control"
                   id="title"
                   value="<?= $article->getTitle() ?>"/>
        </div>
        <div class="form-group">
            <label for="content">Modification du contenu</label>
            <textarea type="text"
                      class="form-control"
                      id="content"
                      name="content"
                      value="<?= $article->getContent() ?>">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publier la modification</button>
    </form>
</div>

<?php

require_once './templates/footer.php';

?>
