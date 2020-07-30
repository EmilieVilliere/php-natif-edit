<?php

$title= "Books - Liste";

ob_start(); ?>

<div class="container">

    <table id="table">
        <thead id="tbody">
            <tr>
                <th> Titre </th>   
                <th> Auteur </th>   
                <th> Edition </th>   
                <th> Parution </th>   
                <th> Synopsis </th>   
                <th> Prix </th>   
                <th> Pages </th>      
            </tr>
        </thead>
        <tbody id="tbody">

<?php foreach($books as $book) : ?>
        
            <tr>
                <td> <?= $book["b_title"] ?> </td>
                <td> <?= $book["b_author"] ?> </td>
                <td> <?= $book["b_edition"] ?> </td>
                <td> <?= $book["b_year"] ?> </td>
                <td> <?= $book["b_synopsis"] ?> </td>
                <td> <?= $book["b_price"] ?> </td>
                <td> <?= $book["b_numberPages"] ?> </td>
                <td>
				    <a href="form.php?edit=<?= $book['id']; ?>">Modifier</a>
                </td> 
            </tr>

<?php endforeach; ?>

        </tbody>
    </table>

</div>

<?php 

$content = ob_get_clean(); 

require "template.php"; ?>
