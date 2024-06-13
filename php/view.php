<?php
session_start();
include 'utility.php';

if (isset($_GET["table"])){
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
    <div class="container-xl pt-4">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <h3 class="m-0 fw-bold text-white">Gestione Aziende Ospedaliere</h3>
            <a class="btn btn-outline-light" href="../login.php">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </a>
        </nav>
    </div>
</header>






    <section class="container-xl mx-auto my-5">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
            <form action="opmanager.php" method="POST" class="w-100">
                <div class='d-flex justify-content-end align-items-center'>
                    <?php if (true) {
                        showWorkerSelect();
                    } else {
                        showUserSelect();
                    }?>
                    <button class="btn btn-outline-secondary ms-3 h-100" type="submit" value="select-table" name="operation">Visualizza</button>
                </div>
            </form>

            <?php 
            if (true) {
                echo "
                <div class='d-flex justify-content-between align-items-center text-center mt-4'>
                <div>
                    <h3 class='fw-bold fs-6 text-uppercase'> Personale per reparto </h3>
                    <a href='../examples/personalexreparto.php'>
                        <button class='btn btn-outline-dark' type='submit'>
                                Vai alla pagina 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up-right' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z'/>
                            </svg>  
                        </button>
                    </a>
                </div>
                
                <div class='align-items-center'>
                    <h3 class='fw-bold fs-6 text-uppercase'> Ricovero per paziente 
                    </h3>
                    <a href='../examples/personalexreparto.php'>
                    <button class='btn btn-outline-dark' type='submit'>
                            Vai alla pagina 
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up-right' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z'/>
                        </svg>  
                    </button>
                    </a>
                </div>

                <div>
                    <h3 class='fw-bold fs-6 text-uppercase'> Sostituzioni primari
                    </h3>
                    <a href='../examples/personalexreparto.php'>
                       <button class='btn btn-outline-dark' type='submit'>
                            Vai alla pagina 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up-right' viewBox='0 0 16 16'>
                                <path fill-rule='evenodd' d='M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z'/>
                            </svg>  
                        </button>
                    </a>
                </div>
                </div>
               ";

            }
            ?>

        </div>
    </section>

    <section class="container-xl mx-auto my-5">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
            <div class='d-flex justify-content-between mb-5 align-items-center'>
                <h3 class='fw-bold text-capitalize'><?php echo $table ?></h3>
                <a class='btn btn-outline-secondary me-10 fs-7' href="insert.php">Inserisci
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                    </svg>
                </a>
            </div>
            <?php showTable(connectToDatabase()); ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php
function showTable($conn)
{
    global $table;
    $tables = [];
    $result = pg_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
    while ($row = pg_fetch_assoc($result)) {
        $tables[] = $row['table_name'];
    }

    $table_data = [];
    if (in_array($table, $tables)) {
        $table_name = pg_escape_identifier($conn, $table);
        $table_result = pg_query($conn, "SELECT * FROM $table_name");
        while ($row = pg_fetch_assoc($table_result)) {
            $table_data[] = $row;
        }
        echo buildTable(array_keys($table_data[0]), $table_data);
    }
}

function showWorkerSelect()
{
    $conn = connectToDatabase();
    $string = "<select class='form-select' name='select' size='5'>";

    $allTables = getTables($conn);

    foreach($allTables as $table) {
        $table = strtoupper($table);
        $string .= "<option value='{$table}'>{$table}</option>";
    }

    echo $string ."</select>";
}

function showUserSelect()
{
    $conn = connectToDatabase();
    $string = "<select class='form-select' name='select' size='5'>";

    $allTables = getTables($conn);

    foreach($allTables as $table) {
        $table = strtoupper($table);
        $string .= "<option value='{$table}'>{$table}</option>";
    }

    echo $string ."</select>";
}
?>
