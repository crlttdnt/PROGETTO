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
    <section id="esami">
        <h2>Esami</h2>
    <form id="esamiForm">
        <label for="pazienteVisita">Codice Fiscale del Paziente:</label>
        <input type="text" id="pazienteVisita" name="pazienteVisita" required>
        
        <label for="dataPrenotazione">Data Prenotazione:</label>
        <input type="date" id="dataPrenotazione" name="dataPrenotazione" required>
        
        <label for="urgenza">Urgenza:</label>
        <div>
            <label>
                <input type="radio" name="urgenza" value="verde" required> Verde
            </label><br>
            <label>
                <input type="radio" name="urgenza" value="giallo" required> Giallo
            </label><br>
            <label>
                <input type="radio" name="urgenza" value="rosso" required> Rosso
            </label><br>
        </div>
        
        <label for="codiceEsame">Codice Esame:</label>
        <input type="text" id="codiceEsame" name="codiceEsame" required>
        
        <label for="dataEsame">Data e Ora Esame:</label>
        <input type="datetime-local" id="dataEsame" name="dataEsame" required>
        
        <label for="descrizioneEsame">Descrizione Esame:</label>
        <input type="text" id="descrizioneEsame" name="descrizioneEsame">
        
        <label for="codiceOspedaleEsame">Codice Ospedale:</label>
        <input type="text" id="codiceOspedaleEsame" name="codiceOspedaleEsame">
        
        <label for="nomeRepartoEsame">Nome del Reparto:</label>
        <input type="text" id="nomeRepartoEsame" name="nomeRepartoEsame">
        
        <h4>Inserire Numero della Stanza del Laboratorio Interno o il codice del Laboratorio Esterno in cui si svolge l'esame:</h4>
        
        <label>
            <input type="radio" name="labOption" value="numeroStanza" onclick="toggleFields()"> Numero Stanza
        </label>
        <label>
            <input type="radio" name="labOption" value="codiceLab" onclick="toggleFields()"> Codice Lab Esterno
        </label>
        
        <div id="numeroStanzaField">
            <label for="numeroStanzaEsame">Numero Stanza:</label>
            <input type="text" id="numeroStanzaEsame" name="numeroStanzaEsame">
        </div>
        <div id="codiceLabField">
            <label for="codiceLabEsterno">Codice Lab Esterno:</label>
            <input type="text" id="codiceLabEsterno" name="codiceLabEsterno">
        </div>
        
        <button type="submit">Inserisci</button>
    </form>

                <script>
                    function toggleFields() {
                        const numeroStanzaField = document.getElementById('numeroStanzaField');
                        const codiceLabField = document.getElementById('codiceLabField');
                        const labOption = document.querySelector('input[name="labOption"]:checked').value;
            
                        if (labOption === 'numeroStanza') {
                            numeroStanzaField.style.display = 'block';
                            codiceLabField.style.display = 'none';
                        } else if (labOption === 'codiceLab') {
                            numeroStanzaField.style.display = 'none';
                            codiceLabField.style.display = 'block';
                        }
                    }
            
                    // Nascondere i campi di input inizialmente
                    document.getElementById('numeroStanzaField').style.display = 'none';
                    document.getElementById('codiceLabField').style.display = 'none';
                </script>
        
    </section>
</main>
</body>
</html>
