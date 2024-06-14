<?php
session_start();
include '../php/utility.php';

if (isset($_GET["table"])) {
    $table = strtolower($_GET['table']);
    $_SESSION['table'] = $table;
} elseif (isset($_SESSION['table'])) {
    $table = strtolower($_SESSION['table']);
} else {
    $table = null;
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    echo "<script type='text/javascript'>alert('$error_message');</script>";
    unset($_SESSION['error_message']);
}

$selectedReparto = null;
$selectedOspedale = null;
if (isset($_POST['RepartoOspedale'])) {
    if ($_POST['RepartoOspedale'] === "all") {
        $selectedReparto = "Tutti i reparti";
        $selectedOspedale = "Tutti gli ospedali";
    } else {
        list($selectedReparto, $selectedOspedale) = explode(',', $_POST['RepartoOspedale']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Gestore Aziende Ospedaliere</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container-xl pt-3">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <h2 class="m-0 fw-bold text-white">Gestione Aziende Ospedaliere</h2>
                <a class="btn btn-outline-light" href="../login.php">
                    Login
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </a>
            </nav>
        </div>
    </header>

    <section class="container-xl mx-auto my-5">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
            <h5 class='fw-medium'>Visualizza il personale organico nei reparti della struttura:</h5>
            <form method="POST" class="w-100" action="personalexreparto.php">
                <div class='d-flex justify-content-end align-items-center'>
                    <?php showSelect($selectedReparto, $selectedOspedale); ?>
                    <button class="btn btn-secondary btn-lg ms-3 h-100" type="submit">Visualizza</button>
                </div>
            </form>
        </div>
    </section>

    <section class="container-xl mx-auto my-5">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
            <div class='d-flex justify-content-between align-items-center'>
                <!--
                <a class='btn btn-outline-secondary me-4 fs-5' href="insert.php">Inserisci <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                    </svg></a>
                -->
            </div>
            <?php
            if ($selectedReparto && $selectedOspedale) {
                echo "<p>Personale del reparto " . htmlspecialchars($selectedReparto) . " dell'Ospedale " . htmlspecialchars($selectedOspedale) . ":</p>";
                showTable($selectedReparto, $selectedOspedale);
            }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>




<?php
function showTable($nomeReparto, $ospedale)
{
    $conn = connectToDatabase();

    if ($nomeReparto === "Tutti i reparti" && $ospedale === "Tutti gli ospedali") {
        $query = "SELECT codiceFiscale, nome, cognome, nomeReparto, ospedale FROM Personale";
        $results = pg_query($conn, $query);
    } else {
        $query = "SELECT codiceFiscale, nome, cognome FROM Personale WHERE nomeReparto = $1 AND ospedale = $2";
        $results = pg_query_params($conn, $query, array($nomeReparto, $ospedale));
    }

    if (!$results) {
        $_SESSION['error_message'] = pg_last_error($conn);
        header("Refresh:0");
        exit();
    }

    if (pg_num_rows($results) > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Codice Fiscale</th><th>Nome</th><th>Cognome</th></tr></thead>";
        echo "<tbody>";
        while ($row = pg_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['codicefiscale']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cognome']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No results found.</p>";
    }

    pg_close($conn);
}

function showSelect($selectedReparto, $selectedOspedale)
{
    $conn = connectToDatabase();
    $query = "SELECT DISTINCT nomeReparto, ospedale FROM Personale";
    $string = "<select class='form-select' name='RepartoOspedale'>";
    $string .= "<option value='' disabled selected>Seleziona Reparto e Ospedale</option>";
    $string .= "<option value='all'>Tutti i reparti</option>";
    $options = "";

    try {
        $result = pg_query($conn, $query);
        if (!$result) {
            throw new Exception(pg_last_error($conn));
        }

        while ($row = pg_fetch_assoc($result)) {
            $reparto = htmlspecialchars($row['nomereparto']);
            $ospedale = htmlspecialchars($row['ospedale']);
            $isSelected = ($selectedReparto === $reparto && $selectedOspedale == $ospedale) ? " selected" : "";
            $options .= "<option value='{$reparto},{$ospedale}'{$isSelected}>Reparto: {$reparto}, Codice Ospedale: {$ospedale}</option>";
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
        header("Refresh:0");
        exit();
    } finally {
        pg_close($conn);
    }

    $string .= $options;
    $string .= "</select>";

    echo $string;
}
?>