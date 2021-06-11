<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    // Bootstrap Bundle CDN v5.0.1
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous">
    </script>
    <title>Website News</title>
</head>
<body>
    <?php
        // Autoloading Class function
        function loadClasses($class)
        {
            if (strpos($class, "Controller"))
            {
                require "../Controller/$class.php";
            } else {
                require "../Models/$class.php";
            }
        }

        spl_autoload_register("loadClasses");

        // Class Controller instance
        $controller = new ArticleController();
        $articles   = $controller->readAll();

        foreach ($articles as $article)
        {

        }
        endforeach;
    ?>
</body>
</html>