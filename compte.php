<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Accueil</title>
    </head>
    <body>
            <?php
        include 'librairie.php';
        $activeAccount = getAccountsFromUser()[0];
        list_operations();
        ?>
        </div>
        <a class="btnPage" href="./new_Ope_Form.php">Ajouter une opération</a>
    </body>
</html>