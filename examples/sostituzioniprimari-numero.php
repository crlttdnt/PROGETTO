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

$selectedOption = null;

if (isset($_POST['numSostituzioni'])) {
    $selectedOption = $_POST['numSostituzioni'];
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
    <!-- Navigation -->
    <div class="container-xl pt-3">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <h2 class="m-0 fw-bold text-white">Gestione Aziende Ospedaliere</h2>
            <div>
                <a class="btn btn-outline-light me-2" href="../php/view.php">
                    Home
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                    </svg>
                </a>
                <a class="btn btn-outline-light" href="../login.php">
                    Login
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </a>
            </div>
        </nav>
    </div>
</header>

<section class="container-xl mx-auto my-5">
    <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
        <h5 class='fw-medium'>Visualizza VicePrimari per numero di sostituzioni:</h5>
        <form method="POST" class="w-100" action="">
            <div class='d-flex justify-content-end align-items-center'>
                <?php showSelect($selectedOption); ?>
                <button class="btn btn-secondary btn-lg ms-3 h-100" type="submit">Visualizza</button>
            </div>
        </form>
    </div>
</section>

<section class="container-xl mx-auto my-5">
    <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
        <?php
        if ($selectedOption !== null) {
            showTable($selectedOption);
        }
        ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php
function showTable($numSostituzioni)
{
    $conn = connectToDatabase();

    switch ($numSostituzioni) {
        case 'none':
            $query = "SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
                      FROM VicePrimario vp
                      JOIN PersonaleMedico pm ON vp.codiceFiscale = pm.codiceFiscale
                      JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
                      EXCEPT
                      SELECT s.VicePrimario, p.nome, p.cognome
                      FROM sostituisce s
                      JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
                      JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale";
            break;
        case 'one':
            $query = "SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
                      FROM sostituisce s
                      JOIN VicePrimario vp ON s.VicePrimario = vp.codiceFiscale
                      JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
                      JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
                      GROUP BY vp.codiceFiscale, p.nome, p.cognome
                      HAVING COUNT(*) = 1";
            break;
        case 'two_or_more':
            $query = "SELECT vp.codiceFiscale AS VicePrimario, p.nome, p.cognome
                      FROM sostituisce s
                      JOIN VicePrimario vp ON s.VicePrimario = vp.codiceFiscale
                      JOIN PersonaleMedico pm ON s.VicePrimario = pm.codiceFiscale
                      JOIN Personale p ON pm.codiceFiscale = p.codiceFiscale
                      GROUP BY vp.codiceFiscale, p.nome, p.cognome
                      HAVING COUNT(*) >= 2";
            break;
        default:
            $_SESSION['error_message'] = "Invalid selection.";
            header("Refresh:0");
            exit();
    }

    $results = pg_query($conn, $query);

    if (!$results) {
        $_SESSION['error_message'] = pg_last_error($conn);
        header("Refresh:0");
        exit();
    }

    $rowCount = pg_num_rows($results);

    if ($rowCount > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>VicePrimario</th><th>Nome</th><th>Cognome</th></tr></thead>";
        echo "<tbody>";
        while ($row = pg_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['viceprimario']) . "</td>";
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



function showSelect($selectedOption)
{
    $options = [
        'none' => 'Nemmeno una volta',
        'one' => 'Una volta',
        'two_or_more' => 'Due volte o più'
    ];

    $string = "<select class='form-select' name='numSostituzioni'>";
    $string .= "<option value='' disabled selected>Seleziona numero di sostituzioni</option>";

    foreach ($options as $value => $label) {
        $isSelected = ($selectedOption === $value) ? " selected" : "";
        $string .= "<option value='{$value}'{$isSelected}>{$label}</option>";
    }

    $string .= "</select>";

    echo $string;
}
?>
