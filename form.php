<?php

require "Model.php";


/* Si action = ajouter => le form est vide, il sert à ajouter un livre
   Si action = modifier => le form est rempli avec les infos du bouquin à modifier, et il sert à update le bouquin */

   if(isset($_GET["action"])) {
        if($_GET["action"] == "create") {
            if(isset($_POST["b_title"])) {

                $data = array(
                    $_POST["b_title"],
                    $_POST["b_author"],
                    $_POST["b_edition"],
                    $_POST["b_year"],
                    $_POST["b_synopsis"],
                    $_POST["b_price"],
                    $_POST["b_numberPages"]
                );
                
                // var_dump($data);
                // // die();

                setBook($data);    

            }
        }
    }

    if(isset($_GET["action"])) {
        if($_GET["action"] == "edit") {

            if (isset($_GET["edit"])) {

                $id = $_GET["edit"];
                $update = true;

                $bdd = getBdd();
                $req = $bdd->prepare("SELECT * FROM t_books WHERE id= ?");
                $req->execute(array($id));

                if ($req->rowCount() == 1 ) {
                    
                    $n =  $req->fetch();
                    $b_title = $n['b_title'];
                    $b_author = $n['b_author'];
                    $b_edition = $n['b_edition'];
                    $b_year = $n['b_year'];
                    $b_synopsis = $n['b_synopsis'];
                    $b_price = $n['b_price'];
                    $b_numberPages = $n['b_numberPages'];
                }

                if(!empty($_POST)) {

                    $data = array(
                        $_POST["b_title"],
                        $_POST["b_author"],
                        $_POST["b_edition"],
                        $_POST["b_year"],
                        $_POST["b_synopsis"],
                        $_POST["b_price"],
                        $_POST["b_numberPages"]
                    );
                        
                        // var_dump($data);
                        // // die();
                    
                        editBook($data);       
                }
            
                

            }

        }

    }

require "viewForm.php";
