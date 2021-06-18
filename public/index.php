<?php
require_once './templates/header.php';

// Class Controller instance
$controller = new ArticleController();
$articles = $controller->readAllByDate();

// Read Method control by button
if ($_POST)
{
    (array_key_exists('btnSortByPriority', $_POST)) ?
        $articles = $controller->readAllByPriority() :
        $articles = $controller->readAllByDate();
}
?>

<form class="container d-flex justify-content-around my-5" method="post">
    <input type="submit" name="btnSortByPriority" class="btn btn-primary" value="Sort by Priority" />
    <input type="submit" name="btnSortByDate" class="btn btn-primary" value="Sort by Date Creation" />
</form>

<div class="container d-flex flex-wrap justify-content-between">
    <?php foreach ($articles as $article): ?>
        <?php
        $borderPriority = null;
        $article->getPriority() === 1 ?
            $borderPriority = "border border-2 border-danger" :
            $borderPriority = "border border-2 border-primary";
        ?>
        <div class="card p-2 m-5 <?= $borderPriority ?>" style="width: 18rem;">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title"><?= substr($article->getTitle(), 0, 75) ?>...</h5>
                <p class="card-text">Publié le : <?= date('d/m/Y', strtotime($article->getDate())) ?></p>
                <p class="card-text"><?= substr($article->getContent(), 0, 80) ?>...</p>
                <div class="d-flex justify-content-between">
                    <a href="read.php?id=<?= $article->getId() ?>" class="btn btn-success">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="updateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="deleteArticle.php?id=<?= $article->getId() ?>" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
require_once './templates/footer.php';
?>