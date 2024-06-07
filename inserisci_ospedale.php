
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

  

<section id="ospedali">
    <h2>Ospedali</h2>
    <form id="ospedaliForm">
        <label for="codice">Codice Ospedale:</label>
        <input type="text" id="codice" name="codice" required>
        <label for="nomeOspedale">Nome Ospedale:</label>
        <input type="text" id="nomeOspedale" name="nomeOspedale" required>
        <label for="citta">Città:</label>
        <input type="text" id="citta" name="citta" required>
        <label for="via">Via:</label>
        <input type="text" id="via" name="via" required>
        <label for="numeroCivico">Numero Civico:</label>
        <input type="text" id="numeroCivico" name="numeroCivico" required>
        <label for="cap">CAP:</label>
        <input type="text" id="cap" name="cap" required>

        <button type="submit">Inserisci</button>
    </form>
</section>
</main>
</body>
</html>
