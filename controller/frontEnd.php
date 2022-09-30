<?php 

use \Exercice\Blog\Model\PostManager;
use \Exercice\Blog\Model\CommentManager;

require_once("model/PostManager.php");
require_once("model/CommentManager.php");

function listPost()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require("view/frontend/listPostsView.php");
}

function post(int $id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
   
    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);

    require("view/frontend/postView.php");

}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $response = $commentManager->postComment($postId, $author, $comment);

    if($response === false){
        throw new Exception("Impossible d'ajouter le commentaire");
    }else{
        header("LOCATION: index.php?action=post&id=".$postId);
    }

}