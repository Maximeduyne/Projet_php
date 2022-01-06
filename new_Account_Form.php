<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title>Main</title>
    </head>
    <body>



        <div class="creation container">
            <h1>Créer un compte</h1>
            <form method="post" action="create_Account.php">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" />
                </div>
                <div class="form-group">
                    <label for="solde">Solde :</label>
                    <input type="number" name="solde" id="solde" placeholder="Solde"/>
                </div>
                <div class="form-group">
                    <label for="type">Type :</label>
                    <SELECT name="type" id="type" size="1">
                        <OPTION>Courant</OPTION>
                        <OPTION>Epargne</OPTION>
                        <OPTION>Joint</OPTION>
                        <OPTION>Prêt</OPTION>
                        <OPTION>Épargne Logement</OPTION>
                    </SELECT>
                </div>
                <div class="form-group">
                    <label for="devise">Devise :</label>
                    <SELECT name="devise" id="devise" size="1">
                        <OPTION>EUR(€)</OPTION>
                        <OPTION>USD($)</OPTION>
                        <OPTION>GBP(£)</OPTION>
                    </SELECT>
                </div>
                <div class="form-group">
                    <p>
                        Définissez un budget à ne pas dépasser, une barre de progression apparaitra pour vous informer de la progression :)
                    </p>
                    <div class="form-group">
                        <label for="budget">Budget :</label>
                        <input type="number" name="budget" id="budget" placeholder="budget"/>
                    </div>
                    <input type="submit" name="valider" value="Valider" />
                </div>
            </form>
        </div>

        <a class="btnPage" href="index.php">Retour</a>
</body>
</html>
