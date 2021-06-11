<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    ?>
</body>
</html>