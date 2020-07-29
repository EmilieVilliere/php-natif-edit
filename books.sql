CREATE DATABASE `books`;

USE `books`;

CREATE TABLE `t_books` (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    b_title VARCHAR(100) NOT NULL,
    b_author VARCHAR(50) NOT NULL,
    b_edition VARCHAR(50) NOT NULL,
    b_year INT NOT NULL,
    b_synopsis TEXT,
    b_price INT(11),
    b_numberPages INT(11)
);

INSERT INTO `t_books` (b_title, b_author, b_edition, b_year, b_synopsis, b_price, b_numberPages) 
    VALUES (
        "Harry Potter à l'école des sorciers", "J.K. Rowling", "Roman Junior", 1997,
        "Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, 
            voit son existence bouleversée. Un géant nommé Hagrid, vient le chercher pour l'emmener à Poudlard, 
            une école de sorcellerie ! ", 9, 320
    );

INSERT INTO `t_books` (b_title, b_author, b_edition, b_year, b_synopsis, b_price, b_numberPages) 
    VALUES (
        "Le php pour les nuls", "Janet Valade", "Edition pour les nuls", 2004,
        "Le php c'est magnifique mais chiant !", 3, 995
    );
