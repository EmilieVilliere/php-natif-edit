<?php 

$title= "Books - Form";

ob_start(); ?>

<div class="container">

<a href="http://localhost/books/index.php">Revenir aux livres !</a><br>

    <div id="form-book">
        <form action="form.php" method="post">

            <input type="hidden" name="id" value="<?= $id; ?>">

            <label for="b_title">Titre du livre</label><br>
            <input class="form-items" type="text" name="b_title" id="b_title" value="<?= $b_title; ?>">
            <br>

            <label for="b_author">Auteur :</label><br>
            <input class="form-items" type="text" name="b_author" id="b_author" value="<?= $b_author; ?>">
            <br>

            <label for="b_edition">Edition :</label><br>
            <input type="text" name="b_edition" id="b_edition" class="form-items" value="<?= $b_edition; ?>">
            <br>

            <label for="b_year">Année de parution :</label><br>
            <input class="form-items" type="number" name="b_year" id="b_year" min="1400" max="2020" value="<?= $b_year; ?>">
            <br>

            <label for="b_synopsis">Synopsis :</label><br>
            <textarea type="text" name="b_synopsis" id="b_synopsis" class="form-items" rows="5" cols="33"><?= $b_synopsis; ?></textarea>
            <br>

            <label for="b_price">Prix :</label><br>
            <input class="form-items" type="number" name="b_price" id="b_price" min="1" max="2000" value="<?= $b_price; ?>">
            <br>

            <label for="b_numberPages">Nombre de pages :</label><br>
            <input class="form-items" type="number" name="b_numberPages" id="b_numberPages" min="1" max="10000" value="<?= $b_numberPages; ?>">
            <br>

            <?php if ($update == true): ?>
                <button type="submit" class="form-items" name="update"> Mettre à jour </button>
            <?php else: ?>
                <button type="submit" class="form-items" name="save"> Enregistrer </button>
            <?php endif ?>

        </form>
        
    </div>

</div>

<?php 

$content = ob_get_clean(); 

require "template.php"; ?>
