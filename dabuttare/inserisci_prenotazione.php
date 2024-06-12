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
                <!--
                    <li><a href="inserisci_ospedale.html">Ospedali</a></li>
                <li><a href="inserisci_personale.html">Personale</a></li>
                <li><a href="inserisci_esame.html">Esami</a></li>
                <li><a href="inserisci_paziente.html">Pazienti</a></li>
                <li><a href="inserisci_prenotazione.html">Prenotazioni</a></li>
                -->
            </ul>
        </nav>
    </header>
<main>
    <section id="prenotazioni">
        <h2>Prenotazioni</h2>
        <form id="prenotazioniForm">
            <label for="codiceFiscalePrenotazione">Codice Fiscale Paziente:</label>
            <input type="text" id="codiceFiscalePrenotazione" name="codiceFiscalePrenotazione" required>
            <label for="dataPrenotazioneEsame">Data Prenotazione:</label>
            <input type="date" id="dataPrenotazioneEsame" name="dataPrenotazioneEsame" required>
            <label for="descrizionePrenotazione">Descrizione Esame:</label>
            <input type="text" id="descrizionePrenotazione" name="descrizionePrenotazione">
            <button type="submit">Inserisci</button>
        </form>
    </section>
</main>
</body>
</html>
