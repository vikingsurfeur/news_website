<?php

require_once './templates/header.php';

$controller = new ArticleController();

if ($_POST)
{
    isset($_POST['priority']) ? $_POST['priority'] = 1 : $_POST['priority'] = 0;

    $article = new Article($_POST);
    $controller->create($article);

    echo "<script>window.location.href='./index.php'</script>";
}

?>

<div class="container">
    <h3 class="m-5">Création de l'article</h3>
    <form method="POST">
        <div class="form-group m-5">
            <label for="title">Titre de l'article</label>
            <input class="form-control" type="text" id="title" name="title" value="">
        </div>
        <div class="form-group m-5">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" type="text" id="content" name="content" cols="20" rows="5" ></textarea>
        </div>
        <div class="form-check m-5">
            <label class="form-check-label" for="priority">
                Article Important ?
            </label>
            <input class="form-check-input" type="checkbox" id="priority" name="priority">
        </div>
        <button type="submit" class="btn btn-success m-5">Publier l'article</button>
    </form>
</div>

<?php

require_once './templates/footer.php';

?>
