<!doctype html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Bootstrap Bundle CDN v5.0.1-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                crossorigin="anonymous">
        </script>
        <!--Font Awesome-->
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
              integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
              crossorigin="anonymous">
        <title>Website News</title>
    </head>
    <body>
        <?php
        // Autoloading Class function
        function loadClasses($class)
        {
            if (strpos($class, "Controller")) {
                require "../Controller/$class.php";
            } else {
                require "../Models/$class.php";
            }
        }

        spl_autoload_register("loadClasses");

        // Class Controller instance
        $controller = new ArticleController();
        $articles = $controller->readAll();

        ?>
        <div class="container d-flex flex-wrap">
            <?php foreach ($articles as $article): ?>
                <div class="card p-2 m-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text"><?= $article->getContent() ?></p>
                        <div class="d-flex justify-content-between">
                            <a href="../pages/updateArticle?<?= $article->getId() ?>.php" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="../pages/deleteArticle?<?= $article->getId() ?>.php" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>