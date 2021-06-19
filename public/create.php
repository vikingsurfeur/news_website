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
    <h3 class="m-5">Create a Todo</h3>
    <form method="POST">
        <div class="form-group m-5">
            <label class="h5" for="title">Todo Title</label>
            <input class="form-control mt-3" type="text" id="title" name="title" value="">
        </div>
        <div class="form-group m-5">
            <label class="h5" for="content">Todo Content</label>
            <textarea class="form-control mt-3" type="text" id="content" name="content" cols="20" rows="5" ></textarea>
        </div>
        <div class="form-check m-5">
            <label class="form-check-label h6" for="priority">
                Most Important Todo ?
            </label>
            <input class="form-check-input" type="checkbox" id="priority" name="priority">
        </div>
        <button type="submit" class="btn btn-success m-5">Save my Todo</button>
    </form>
</div>

<?php
    require_once './templates/footer.php';
?>
