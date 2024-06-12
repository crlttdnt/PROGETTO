<?php
session_start();


if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    echo "<script type='text/javascript'>alert('$error_message');</script>";
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestione aziende ospedaliere </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Gestione aziende ospedaliere</h1>
        <nav>
            <ul>
                <li><a href="/php/home.php">Home</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section id="ospedale" class="section-container">
            <h1 class="mb-4 section-title">Ospedale</h1>
            <div class="d-flex justify-content-center mb-5">
                <a href="inserisci_ospedale.php" class="btn custom-oval-btn mx-2">
                    Inserisci
                </a>
                <a href="modifica_ospedale.php" class="btn custom-oval-btn mx-2">
                    Modifica
                </a>
                <a href="php/view.php" class="btn custom-oval-btn mx-2">
                    Visualizza
                </a>
            </div>
        </section>
        
        <section id="paziente" class="section-container">
            <h1 class="mb-4 section-title">Paziente</h1>
            <div class="d-flex justify-content-center mb-5">
                <a href="inserisci_paziente.php" class="btn custom-oval-btn mx-2">
                    Inserisci
                </a>
                <a href="modifica_paziente.php" class="btn custom-oval-btn mx-2">
                    Modifica
                </a>
                <a href="view.php" class="btn custom-oval-btn mx-2">
                    Visualizza
                </a>
            </div>
        </section>
        
        <section id="personale" class="section-container">
            <h1 class="mb-4 section-title">Personale</h1>
            <div class="d-flex justify-content-center mb-5">
                <a href="inserisci_personale.php" class="btn custom-oval-btn mx-2">
                    Inserisci
                </a>
                <a href="modifica_personale.php" class="btn custom-oval-btn mx-2">
                    Modifica
                </a>
                <a href="view.php" class="btn custom-oval-btn mx-2">
                    Visualizza
                </a>
            </div>
        </section>

        <section id="esame" class="section-container">
            <h1 class="mb-4 section-title">Esame</h1>
            <div class="d-flex justify-content-center mb-5">
                <a href="inserisci_esame.php" class="btn custom-oval-btn mx-2">
                    Inserisci
                </a>
                <a href="modifica_personale.php" class="btn custom-oval-btn mx-2">
                    Modifica
                </a>
                <a href="view.php" class="btn custom-oval-btn mx-2">
                    Visualizza
                </a>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Gestione aziende ospedaliere. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
