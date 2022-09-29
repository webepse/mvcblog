<?php 
    require("controller/frontEnd.php");

    try{
        if(isset($_GET['action']))
        {
            if($_GET['action']=='listPosts')
            {
                listPost();
            }else{
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
