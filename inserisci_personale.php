<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione aziende ospedaliere</title>
    <link rel="stylesheet" href="styles.css">


    

</head>
<body>

    <header>
        <h1>Gestione aziende ospedaliere</h1>
        <nav>
            <ul>
                <li><a href="home.php">Torna alla Home</a></li>
            </ul>
        </nav>
    </header>
<main> 
    <section id="personale">
        <h2>Personale</h2>
        <form id="personaleForm">
            <!-- Dati Personali-->
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required>
            <label for="dataNascita">Data di Nascita:</label>
            <input type="date" id="dataNascita" name="dataNascita" required>
            <label for="codiceFiscale">Codice Fiscale:</label>
            <input type="text" id="codiceFiscale" name="codiceFiscale" required>
            <!-- Indirizzo-->
            <label for="cittaPersonale">Città:</label>
            <input type="text" id="cittaPersonale" name="cittaPersonale" required>
            <label for="viaPersonale">Via:</label>
            <input type="text" id="viaPersonale" name="viaPersonale" required>                
            <label for="numeroCivicoPersonale">Numero Civico:</label>
            <input type="text" id="numeroCivicoPersonale" name="numeroCivicoPersonale" required>
            <label for="capPersonale">CAP:</label>
            <input type="text" id="capPersonale" name="capPersonale" required>
            <!-- Info lavorative-->
            <label for="nomeReparto">Nome Reparto:</label>
            <input type="text" id="nomeReparto" name="nomeReparto" required>
            <label for="codiceOspedale">Codice Ospedale:</label>
            <input type="text" id="codiceOspedale" name="codiceOspedale" required>
            
            <button type="submit">Inserisci</button>
        </form>
    </section>
</main>
</body>
</html>
