<?php

require_once './templates/header.php';

// Class Controller instance
$controller = new ArticleController();
$articles = $controller->readAll();

?>
<div class="container d-flex flex-wrap justify-content-between">
    <?php foreach ($articles as $article): ?>
        <div class="card p-2 m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $article->getTitle() ?></h5>
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