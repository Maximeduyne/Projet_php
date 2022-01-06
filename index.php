<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Accueil</title>
</head>
<body>
<h1>Mes comptes</h1>

<?php
include 'librairie.php';
list_accounts();
?>

<a href="./new_Account_Form.php">Nouveau compte</a>

</body>
</html>