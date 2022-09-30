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
