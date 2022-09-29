<?php 

use \Exercice\Blog\Model\PostManager;

require_once("model/PostManager.php");

function listPost()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require("view/frontend/listPostsView.php");
}