<?php
namespace Exercice\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments(int $postId)
    {
        $comments = $this->dbConnect()->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
        $comments->execute([$postId]);

        return $comments;
    }

    public function getComment(int $commentId)
    {
        $req = $this->dbConnect()->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') AS comment_date_fr FROM comments WHERE id = ?");
        $req->execute([$commentId]);
        $comment = $req->fetch();
        $req->closeCursor();
        return $comment;
    }

    public function postComment(int $postId,string $author,string $comment)
    {
        $addComment = $this->dbConnect()->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())");
        $response = $addComment->execute([$postId, $author, $comment]);
        $addComment->closeCursor();

        return $response;
    }
}