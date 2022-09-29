<?php $title = "Mon blog" ?>

<?php ob_start(); ?>
<h1>Mon super blog! </h1>
<p>Derniers billets du blog:</p>

<?php 
    while($data = $posts->fetch())
    {
?>
    <div class="news">
        <a href="index.php?action=post&id=<?= $data['id'] ?>">
            <h3><?= $data['title'] ?></h3>
        </a>
        <div>
            <?= nl2br($data['content']) ?>
        </div>
    </div>
<?php
    }
    $posts->closeCursor();
    $content = ob_get_clean();
    require("template.php");
?>