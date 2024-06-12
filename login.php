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
        <div class="container-xl mx-auto pt-4">
            <div class="bg-dark rounded-3 position-relative">
                <nav class="navbar navbar-expand-lg bg-body-primary justify-content-between">
                    <div class="pb-1 fw-semibold text-light d-flex gap-2 align-items-center">
                        <h3 class="m-0 p-0 fw-bold">Gestore Aziende Ospedaliere</h3>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section class="container-xl mx-auto" style="padding: 4rem 0;">
    <div class="mx-auto p-5 rounded-4 shadow fit-content border border-secondary border-10" style="width: 85%;">
        <h3 class="text-dark fw-bold fs-3 py-1 px-3 text-uppercase text-center">Log In</h3>
        <section class="container row mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4 mx-2 border rounded mb-4">
                    <h4 class="m-0 p-0 fw-medium text-center">Accesso Dipendente</h4>
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
                <div class="col-md-5 my-4 mx-2 border rounded mb-4">
                    <div class="bg-accent-gradient rounded-5 p-1">
                        <h4 class="m-0 p-0 fw-medium text-center">Accesso Paziente</h4>
                        <div class="mt-3">
                            <form action="opmanager.php" method="POST" class="styled-form">
                                <input type="hidden" name="operation" value="login-patient">
                                <?php
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
                </div>
            </div>
        </section>
    </div>
</section>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
