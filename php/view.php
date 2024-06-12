<?php
// Include the database connection file and the buildTable function file
include 'utility.php';
include 'opmanager.php';


function showTable()
{
    // Connect to the database
    $conn = connectToDatabase();
    // Fetch the list of tables in the database
    $tables = [];
    $result = executeQuery($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
    while ($row = pg_fetch_assoc($result)) {
        $tables[] = $row['table_name'];
    }

    // Fetch data from the selected table
    $table_data = [];
    $columns = [];
    if (isset($_GET['table']) && in_array($_GET['table'], $tables)) {
        $table_name = pg_escape_identifier($conn, $_GET['table']);
        $table_result = executeQuery($conn, "SELECT * FROM $table_name");
        $columns = array_keys(pg_fetch_assoc($table_result)); // Fetch column names
        pg_result_seek($table_result, 0); // Reset the result cursor
        while ($row = pg_fetch_assoc($table_result)) {
            $table_data[] = $row;
        }
    }

    buildTable($table_name, array_keys($table_data[0]), $table_data);
}


?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione aziende ospedaliere</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Gestione aziende ospedaliere</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php 
            showTable();
        ?>
    </main>

</body>

</html>