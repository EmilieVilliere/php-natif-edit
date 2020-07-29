<?php 

function getBdd() {

    $bdd = new PDO('mysql:host=localhost;dbname=books;charset=utf8', 'root', '');
    return $bdd;

}

function getBooks() {

    $bdd = getBdd();
    $books = $bdd->query('SELECT * FROM t_books');
    return $books;

}

function setBook($data) {

    $bdd = getBdd();
    $book = $bdd->prepare('INSERT INTO t_books (b_title, b_author, b_edition, b_year, b_synopsis, b_price, b_numberPages) VALUES ( ?, ?, ?, ?, ?, ?, ?)');
    $book->execute($data);

}

function editBook($data) {

    $bdd = getBdd();
    $book = $bdd->prepare("UPDATE t_books SET (b_title = ?, b_author = ?, b_edition = ?, b_year = ?, b_synopsis = ?, b_price = ?, b_numberPages = ?) WHERE id=?");
    $book->execute($data);

}