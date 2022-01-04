<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8" />
        <title>Create Account</title>
    </head>

    <body>

        <?php

        function accountInputConstructor(){
            $userBDD = getFileContent('User');
            $userID = explode(' ; ', $userBDD)[0];
            $accountInfo = $userID . " : " . getAccountsFromUser($userID) . " ; " . nom . " ; " . type . " ; " . solde . " ; " . devise . " ; " . budget;
            }

        function validform() {
            $accountBDD = getFileContent('Account');
            accountInfoConstructor();
            array_push($accountBDD, accountInputConstructor);
        }

        function getFileContent( $fileName ) {
            $fileString = file_get_contents( "./Datasets/$fileName.txt" );
            $fileArray  = explode( "\n", $fileString );
            $data       = [];

            foreach( $fileArray as $key => $value ):
                // Leave the current iteration if value is empty
                if( strlen( $value ) == 0 ) continue;

                // Push data inside array
                array_push( $data, explode( ';', $value ) );

            endforeach;

            return $data;
        }

        function getAccountsFromUser( $user ){
            $AccountsBDD = getFileContent('Account');
            $AccountsNumber = 0;

            foreach( $AccountsBDD as $key => $value ):
                // Leave the current iteration if value is empty
                if( strlen( $value ) == 0 ) continue;

                //if $value start with $user
                if( strpos( $value, $user ) === 0 ){
                    $AccountsNumber +=1 ;
                }

            endforeach;

            return $AccountsNumber;
        }

        function deleteAccount($userID){
            //delete account from user file and account file

        }

        validform();

        ?>

    </body>
</html>

