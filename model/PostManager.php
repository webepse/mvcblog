<?php 
namespace Exercice\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    /**
     * Permet d'afficher les 5 derniers posts
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT id,title,content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,5");

        return $req;
    }

    public function getPost(int $postId)
    {
        $req = $this->dbConnect()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date_fr FROM posts WHERE id=?");
        $req->execute([$postId]);
        $post = $req->fetch();
        $req->closeCursor();

        return $post;
    }

}