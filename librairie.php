<?php

function userID(){
    $userBDD = file_get_contents("./Datasets/User.txt");
    return explode(';', $userBDD)[0];
}

function accountInfoConstructor(){
    $existing = getAccountsFromUser();
    sort($existing);
    $accountID = 0;
    foreach($existing as $tested){
        if ($tested[1] == $accountID){
            $accountID ++;
        } else {
            break;
        }
    }
    return userID() . ";" . $accountID . ";" . $_POST["nom"] . ";" . $_POST["type"] . ";" . $_POST["solde"] . ";" . $_POST["devise"] . ";" . $_POST["budget"];
}

function validform() {
    if (sizeof(getAccountsFromUser()) >= 10) {
        echo "<div class='validationform'><p>Vous ne pouvez pas créer plus de 10 compte</p></div>";
    }
    else {
        fileAppendLine('Account', accountInfoConstructor());
        echo '<div class="validationform"><p>Votre compte ' . $_POST["type"] . ' "' . $_POST["nom"] . '" a bien été créé</p></div>';
    }
}

function VerificationForm(){
    $_POST["solde"] = intval($_POST["solde"]);
    $_POST["budget"] = intval($_POST["budget"]);
    $formValide = is_int($_POST["solde"]) && is_int($_POST["budget"]);
    if ($formValide){
        validForm();
    }
}


function getFileContent( $fileName ) {
    $fileString = file_get_contents( "./Datasets/$fileName.txt" );
    $fileArray  = explode( "\n", $fileString );
    $data       = [];

    foreach( $fileArray as $value ):
        // Leave the current iteration if value is empty
        if( strlen( $value ) == 0 ) continue;

        // Push data inside array
        array_push( $data, explode( ';', $value ) );

    endforeach;

    return $data;
}

function getAccountsFromUser(){
    $AccountsBDD = getFileContent('Account');
    $Accounts = [];

    foreach($AccountsBDD as $value ){
        if( $value[0] == userID() ){
            array_push($Accounts, $value);
        }

    }
    return $Accounts;
}

function getOpeFromAccount($Account){
    $OpeBDD = getFileContent('Operation');
    $Opes = [];

    foreach($Opes as $value ){
        if( $value[0] == userID() && $value[1] == $Account){
            array_push($Opes, $value);
        }

    }
    return $Opes;
}

function fileAppendLine($file, $content){
    file_put_contents("./Datasets/$file.txt", "$content\n", FILE_APPEND);
}

function deleteAccount($userID){
    if (file_get_contents('./Datasets/User.txt') != ""){
        $file = file("./Datasets/User.txt");
        $file = array_diff($file, [$userID]);
        file_put_contents("./Datasets/User.txt", $file);
    }
}

function creationTable($titre, $listTitres, $listContent, $cible)
{
    echo "<table class='container creation'>
            <tr>
            <CAPTION class='title'>$titre</CAPTION>";
    foreach ($listTitres as $titre) {
        echo "<th>$titre</th>";
    }
    echo "</tr>";
    foreach ($listContent as $subject) {
        echo "<tr>";
        foreach ($subject as $info) {
            echo "<td>$info</td>";
        }
        echo "<td><a href='$cible'>+</a></td></tr>";
    }
    echo '</table>';
}




function list_accounts(){
    $titres = array('Nom', 'Type', 'Budget', 'Solde', 'Devise');
    $unorganized = getAccountsFromUser();
    $content = [];
    foreach ($unorganized as $in){
        $organized = array($in[2], $in[3], $in[6], $in[4], $in[5]);
        array_push($content, $organized);
    }
    $cible = './compte.php';
    creationTable('Mes Comptes', $titres, $content, $cible);
}

function list_operations($t){
    $titres = array('Nom', 'Type', 'Budget', 'Solde', 'Devise');
    $unorganized = getAccountsFromUser();
    $content = [];
    foreach ($unorganized as $in){
        $organized = array($in[2], $in[3], $in[6], $in[4], $in[5]);
        array_push($content, $organized);
    }
    $cible = './compte.php';
    creationTable('Mes Comptes', $titres, $content, $cible);
}

/*function list_operations($Account){
    $titres = array('Nom', 'Catégorie', 'Montant', 'Date');
    $unorganized = getOpeFromAccount($Account[1]);
    $content = [];
    foreach ($unorganized as $in){
        $category = opeType($in[3]);
        $organized = array($in[4], $category[1], $category[0] . $in[5], $in[6]);
        array_push($content, $organized);
    }
    $cible = './operation.php';
    creationTable($Account[2], $titres, $content, $cible);
}*/

function opeType($typeID){
    $typesBDD = getFileContent('Category');
    $type = array(' ', 'Inconnu');
    foreach ($typesBDD as $value){
        if ($typeID  == $value[0]){
            $type[1] = $value[1];
            switch ($value[2]) {
                case 'credit':
                    $type[0] = '+';
                case 'debit':
                    $type[0] = '-';
            }
        }
    }
    return $type;
}


?>