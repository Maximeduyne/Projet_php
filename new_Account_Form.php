<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Main</title>
    </head>
    <body>

        <h1>Créer un compte</h1>
        
        <form method="post" action="create_Account.php">
        
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" />
        </div>
    
        <div>
            <label for="solde">Solde :</label>
            <input type="number" name="solde" id="solde" placeholder="Solde"/>
        </div>

        <div>
            <label for="type">Type :</label>
            <SELECT name="type" id="type" size="1">
                <OPTION>Courant</OPTION>
                <OPTION>Epargne</OPTION>
                <OPTION>Joint</OPTION>
                <OPTION>Prêt</OPTION>
                <OPTION>Épargne Logement</OPTION>
            </SELECT>
        </div>
        
        <div>
            <label for="devise">Devise :</label>
            <SELECT name="devise" id="devise" size="1">
                <OPTION>EUR(€)</OPTION>
                <OPTION>USD($)</OPTION>
                <OPTION>GBP(£)</OPTION>
            </SELECT>
        </div>
        
        <div>
            <label for="budget">Budget :</label>
            <input type="number" name="budget" id="budget" placeholder="budget"/>
        </div>

        <p>
            Définissez un budget à ne pas dépasser, une barre de progression apparaitra pour vous informer de la progression :)
        </p>
        <input type="submit" name="valider" value="Valider" />

    </form>

</body>
</html>
