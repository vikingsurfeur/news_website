<?php

require_once './templates/header.php';

$controller = new ArticleController();
$article = $controller->read($_GET["id"]);

?>

<div class="container m-5 mx-auto">
    <h2 class="m-5"><?= $article->getTitle() ?></h2>
    <p class="m-5"><?= $article->getContent() ?></p>
</div>

<!--Post Comment Here-->

<?php

require_once './templates/footer.php';

?>
