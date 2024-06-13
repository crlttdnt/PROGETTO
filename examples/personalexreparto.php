<?php
session_start();
include '../php/utility.php';

if (isset($_GET["table"])) {
    $table = strtolower($_GET['table']);
    $_SESSION['table'] = $table;
} else {
    $table = strtolower($_SESSION['table']);
}



if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    echo "<script type='text/javascript'>alert(`$error_message`);</script>";
    unset($_SESSION['error_message']);
}

$selected = NULL;
if (isset($_POST['Reparto'])) {
    $selected = $_POST['Reparto'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title> Gestore Aziende Ospedaliere
    </title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<header>
    <!-- Navigation -->
    <div class="container-xl pt-4">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <h3 class="m-0 fw-bold text-white">Gestione Aziende Ospedaliere</h3>
            <a class="btn btn-outline-light" href="login.php">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </a>
        </nav>
    </div>
</header>

    <section class="container-xl mx-auto my-5">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-4 ">
        <h5 class='  fw-medium '> Visualizza il personale organico nei reparti della struttura: </h5>
            <form  method="POST" class="w-100" action="personalexreparto.php">
                <div class='d-flex justify-content-end align-items-center'>
                
                        <?php
                            showSelect($selected);
                        ?>

                    <button class="btn btn-secondary btn-lg ms-3 h-100" type="submit" > Visualizza </button>
                </div>
            </form>
        </div>
    </section>


    <section class="container-xl mx-auto my-5">

        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-4 ">
            <div class='d-flex justify-content-between mb-5 align-items-center'>
                <h3 class=' fw-bold text-capitalize'> <?php echo $table ?> </h3>
                <a class='btn btn-outline-secondary me-4 fs-5' href="insert.php"> Inserisci <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                    </svg></a>
            </div>
            <?php
            
            if ($selected) {
                showTable($selected);
            }
             ?>
        </div>



    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php


function showTable($reparto)
{
    global $conn;

    $query = <<<QRY
    SELECT *
    FROM personale
    WHERE reparto = $1
    QRY;

    try {
        $results = pg_query_params($conn, $query, array($reparto));
        if (!$results) {
            throw new Exception(pg_last_error($conn));
        } 
    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
        header("Refresh:0");
        exit();
    }

    $columns = getColumnsByResults($results);
    $resultData = pg_fetch_all($results);

    echo buildTable($resultData, $columns);
}




    function showSelect($selected)
    {
        $conn = connectToDatabase();
        $query = "SELECT * FROM personale";
        $string = "<select class='form-select' name='select' size='5'>";
        try {
            $result = pg_query($conn, $query);
            if (!$result) {
                throw new Exception(pg_last_error($conn));
            }
            
            $results = pg_fetch_all($result);
            if (!$results) {
                throw new Exception("No results found.");
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Refresh:0");
            exit();
        } finally {
            pg_close($conn);
        }
        
        $visualized = array_map(fn ($el) => "{$el['codicefiscale']} - Reparto {$el['nomereparto']} , Ospedale {$el['codice']}", $results);
       
        foreach ($visualized as $table) {
            $isSelected = ($selected === $table) ? " selected" : "";
            $string .= "<option value='{$table}'{$isSelected}>{$table}</option>";
        }
    
        echo $string . "</select>";
       
    }
    


?>