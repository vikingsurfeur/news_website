<?php

include './templates/header.php';

$controller = new ArticleController();

?>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vous êtes sur le point de supprimer un article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes-vous bien sûr de vouloir supprimer l'article n° <?= $_GET['id'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">J'en suis sûr !</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Je ne sais pas en en fait...</button>
            </div>
        </div>
    </div>
</div>


<?php

require_once './templates/footer.php';

?>
