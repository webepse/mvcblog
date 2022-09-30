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