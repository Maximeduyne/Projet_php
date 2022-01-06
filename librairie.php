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
        echo "Vous ne pouvez pas créer plus de 10 compte";
    }
    else {
        fileAppendLine('Account', accountInfoConstructor());
        echo 'Votre compte ' . $_POST["type"] . ' "' . $_POST["nom"] . '" a bien été créé';
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
            array_push($Accounts, $value) ;
        }

    }
    return $Accounts;
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

function creationTable($listTitres, $listContent)
{
    echo "<table><tr>";
    foreach ($listTitres as $titre) {
        echo "<th>$titre</th>";
    }
    echo "</tr>";
    foreach ($listContent as $subject) {
        echo "<tr>";
        foreach ($subject as $info) {
            echo "<td>$info</td>";
        }
        echo "<td><a href='new_Account_Form.php'>+</a></td></tr>";
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
    creationTable($titres, $content);
}


?>