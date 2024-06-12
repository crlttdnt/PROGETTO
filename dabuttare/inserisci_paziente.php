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
    <section id="pazienti">
        <h2>Pazienti</h2>
        <form id="pazientiForm">
            <label for="nomePaziente">Nome:</label>
            <input type="text" id="nomePaziente" name="nomePaziente" required>
            <label for="cognomePaziente">Cognome:</label>
            <input type="text" id="cognomePaziente" name="cognomePaziente" required>
            <label for="dataNascitaPaziente">Data di Nascita:</label>
            <input type="date" id="dataNascitaPaziente" name="dataNascitaPaziente" required>
            <label for="codiceFiscalePaziente">Codice Fiscale:</label>
            <input type="text" id="codiceFiscalePaziente" name="codiceFiscalePaziente" required>
            <label for="cittaPaziente">Città:</label>
            <input type="text" id="cittaPaziente" name="cittaPaziente" required>
            <label for="viaPaziente">Via:</label>
            <input type="text" id="viaPaziente" name="viaPaziente" required>
            <label for="numeroCivicoPaziente">Numero Civico:</label>
            <input type="text" id="numeroCivicoPaziente" name="numeroCivicoPaziente" required>
            <label for="capPaziente">CAP:</label>
            <input type="text" id="capPaziente" name="capPaziente" required>
            <button type="submit">Inserisci</button>
        </form>
    </section>
</main>
</body>
</html>
