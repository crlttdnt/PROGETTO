<?php
session_start();

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
    <link rel="stylesheet" href="css/styles.css">
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



    <section class="container-xl mx-auto" style="padding: 2rem 0;">
    <div class="mx-auto p-5 rounded-4 shadow fit-content border border-secondary" style="width: 90%;">
        <h3 class="text-dark fw-bold fs-3 py-1 px-3 text-uppercase text-center">Log In</h3>
        <section class="container row mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4 mx-2 border rounded mb-4 login-card">
                <h4 class="m-0 p-0 fw-medium text-center" style="margin-top: 20px !important;">Accesso Dipendente</h4>
                    <div class="mt-3">
                        <form action="opmanager.php" method="POST" class="styled-form">
                            <input type="hidden" name="operation" value="login-worker">
                            <?php
                            include("php/utility.php");
                            echo inputText("Username", true, true, NULL);
                            echo inputPassword("Password", true);
                            ?>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-lg btn-outline-dark">
                                    Accedi
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 my-4 mx-2 border rounded mb-4 login-card">
                <h4 class="m-0 p-0 fw-medium text-center" style="margin-top: 20px !important;">Accesso Paziente</h4>
                    <div class="mt-3">
                        <form action="opmanager.php" method="POST" class="styled-form">
                            <input type="hidden" name="operation" value="login-patient">
                            <?php
                            echo inputText("Username", true, true, NULL);
                            echo inputPassword("Password", true);
                            ?>
                            <div class="d-flex justify-content-center mt-4" style="margin-bottom: 20px;">
                                <button type="submit" class="btn btn-lg btn-outline-dark" >
                                    Accedi
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
