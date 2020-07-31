<?php

require "Model.php";

/* Si action = ajouter => le form est vide, il sert à ajouter un livre
   Si action = modifier => le form est rempli avec les infos du bouquin à modifier, et il sert à update le bouquin */
   

   //gérer les erreurs
    if(isset($error) && $error != "") {
        echo "<p>" . $error . "</p>";
    }

    if(!empty($_POST)) {

        $error= [];

        $post = array_map("trim", array_map("strip_tags", $_POST));

        $arrayToModif = array_map("strip_tags", $_POST);
        $arrayFinal = array_map("trim", $arrayToModif);

        if(!isset($post['b_title']) || strlen($post["b_title"]) <= 3 || strlen($post["b_title"]) < 100) {
            $error = "Le titre n'est pas valide";
        }

        if(!isset($post['b_author']) || strlen($post["b_author"]) <= 3 || strlen($post["b_author"]) < 0) {
            $error = "Le nom de l'auteur n'est pas valide";
        }

        if(!isset($post['b_edition']) || strlen($post["b_edition"]) <= 3 || strlen($post["b_edition"]) < 50) {
            $error = "Le nom de l'édition n'est pas valide";
        }
    }

    
    // initialize variables 

    $id = 0;
    $update = false;
    $b_title = '';
    $b_author =  '';
    $b_edition ='';
    $b_year = '';
    $b_synopsis = '';
    $b_price ='';
    $b_numberPages ='';

// condition for prepare data to save
if(isset($_POST["save"])) {

    if(!empty($b_year)) { 
        if($b_year < 1400 && 2020 < $b_year) { 
            echo "NOPE !"; 
        }
    }

    if(!empty($b_numberPagesyear)) {
        if($b_numberPagesyear < 1 && 10000 < $b_numberPagesyear) {
            echo "NOPE !";
        }
    }

    $data = array(

        $b_title = $_POST["b_title"],
        $b_author =  $_POST["b_author"],
        $b_edition = $_POST["b_edition"],
        $b_year =  $_POST["b_year"],
        $b_synopsis = $_POST["b_synopsis"],
        $b_price = $_POST["b_price"],
        $b_numberPages = $_POST["b_numberPages"]

    );

    setBook($data);    
}

// condition for prepare data to be displayed on edit view
if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
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
}

// condition for prepare data to be updated in database
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $data = array(

        $id,
        $b_title =  $_POST["b_title"],
        $b_author =  $_POST["b_author"],
        $b_edition = $_POST["b_edition"],
        $b_year =  $_POST["b_year"],
        $b_synopsis = $_POST["b_synopsis"],
        $b_price = $_POST["b_price"],
        $b_numberPages = $_POST["b_numberPages"]
        
    );

    //var_dump($data);
    // die();
                    
    editBook($data);  

}

// if (isset($_GET['del'])) {

// 	$id = $_GET['del'];
    
//     removeBook($id);
// }

require "viewForm.php";
