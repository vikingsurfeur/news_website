<!doctype html>
<html lang="en-EN">
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
    <!--Personnal StyleSheet-->
    <link href="../style/style.css"
          rel="stylesheet">
    <title>Todo App</title>
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
?>

<nav class="container navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./index.php">
            <i class="far fa-check-circle fa-2x text-white"></i>
            <h1 class="ms-3 text-white">Todo App</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-lg-grow-0 ms-auto" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-baseline" href="./create.php">
                        <i class="fas fa-plus-square me-3 fa-lg link-primary"></i>
                        <h4 class="text-white">Add a Todo Item</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
