<?php

require "Model.php";

/* Si action = ajouter => le form est vide, il sert à ajouter un livre
   Si action = modifier => le form est rempli avec les infos du bouquin à modifier, et il sert à update le bouquin */
   
   $id = 0;
   // initialize variables 
   $update = false;
   $b_title = '';
    $b_author =  '';
    $b_edition ='';
    $b_year = '';
    $b_synopsis = '';
    $b_price ='';
    $b_numberPages ='';

// condition for prepare data to save
if(!empty($_POST["b_title"])) {

    if(isset($_POST["save"])) {

        $data = array(
    
            $b_title = $_POST["b_title"],
            $b_author =  $_POST["b_author"],
            $b_edition = $_POST["b_edition"],
            $b_year =  $_POST["b_year"],
            $b_synopsis = $_POST["b_synopsis"],
            $b_price = $_POST["b_price"],
            $b_numberPages = $_POST["b_numberPages"]
    
        );
        
        // var_dump($data);
        // // die();
    
        setBook($data);    
    
    }

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

// problème dans les ternaires du viewForm, si je n'ai pas de date tu m'affiches rien 

require "viewForm.php";
