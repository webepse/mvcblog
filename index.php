<?php 
    require("controller/frontEnd.php");

    try{
        if(isset($_GET['action']))
        {
            if($_GET['action']=='listPosts')
            {
                listPost();
            }elseif($_GET['action']=="post")
            {
                if(isset($_GET['id']) && !empty($_GET['id']))
                {
                    post($_GET['id']);
                }else{
                    throw new Exception("Aucun identifant d'article envoyé");
                }
            }elseif($_GET['action']=="addComment")
            {
                if(isset($_GET['id']) && !empty($_GET['id']))
                {
                    if(!empty($_POST['author']) && !empty($_POST['comment']))
                    {
                        $id= htmlspecialchars($_GET['id']);
                        $author= htmlspecialchars($_POST['author']);
                        $comment= htmlspecialchars($_POST['comment']);
                        addComment($id, $author, $comment);
                    }else{
                        throw new Exception("vous n'avez pas tout rempli"); 
                    }
                }else{
                    throw new Exception("Aucun identifant d'article envoyé");
                }
            }
            else{
                listPost();
            }
        }else{
            listPost();
        }
    }catch(Exception $e)
    {
        $errorMessage = $e->getMessage();
        // appel de la view pour les erreurs
    } 
