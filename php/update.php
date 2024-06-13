<?php
session_start();
$table = $_SESSION['table'];

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
    <title> Gestore Aziende Ospedaliere
    </title>
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
            <a class="btn btn-outline-light" href="../login.php">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </a>
        </nav>
    </div>
</header>

    <section class="container-xl mx-auto">
        <div class="bg-white mx-auto p-5 rounded-4 fit-content border border-secondary border-10">
            <div class='d-flex justify-content-between mb-5 align-items-center'>
                <h3 class=' fw-bold text-capitalize'> <?php echo $table ?> </h3>
                <a class='btn btn-outline-secondary me-4 fs-5' href='view.php'> Indietro <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-left-short' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5' />
                    </svg></a>
            </div>
            <form method="POST" action="opmanager.php" class="styled-form w-80">
            <?php include 'utility.php';
            showEditForm(); ?>

            <button class='btn btn-secondary fs-5' type='submit' value='update' name='operation'>Salva</button>
            
            </form>
        </div>



    </section>
    <script>
                   
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php

function showEditForm()
{
    global $table;

    $conn = connectToDatabase();
    $form = [];

    $columns = getColumnsInfo($conn, $table);

    $primaryKeys = getPrimaryKeys($conn, $table);

    $valuesForFields = $_SESSION['edit_data'];
    $form += getInputFields($conn, $columns, $primaryKeys, $valuesForFields);

    ksort($form);

    echo implode('', $form);
}






?>