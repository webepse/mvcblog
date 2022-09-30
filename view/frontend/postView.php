<?php $title = $post['title'] ?>

<?php ob_start(); ?>

<h1>Mon super blog</h1>
<a href="index.php">Retour vers la liste des articles</a>

<div class="news">
    <h3><?= $post['title'] ?></h3>
    <div><em><?= $post['creation_date_fr'] ?></em></div>
    <div>
        <?= nl2br($post['content']) ?>
    </div>
</div>

<h2>Commentaires</h2>
    <div>
        <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="POST">
            <div>
                <label for="author">Auteur: </label>
                <input type="text" id="author" name="author">
            </div>
            <div>
                <label for="comment">Commentaire: </label><br>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" value="envoyer">
            </div>
        </form>

    </div>


<?php 
    while($comment = $comments->fetch())
    {
?>
    <div>
        <div><strong><?= $comment['author'] ?></strong></div>
        <div><em>le <?= $comment['comment_date_fr'] ?></em></div>
        <div><?= nl2br($comment['comment']) ?></div>
    </div>
<?php
    }
    $comments->closeCursor();
    $content = ob_get_clean();
    require "template.php";
?>