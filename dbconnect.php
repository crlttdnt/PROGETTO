<?php 
//error_reporting(E_ERROR); //Hides Warning

$connectionString = "host=localhost port=5432 dbname=ospedali user=postgres password=unimi";

//Connection to database
function connectToDatabase()
{
    global $connectionString;
    $connection = pg_connect($connectionString);
    if (!$connection) {
        echo '<br> Connessione al database fallita. <br>';
        exit();
    }
    return $connection;
}

function executeQuery($connection, $query, $params = NULL)
{
    if (!$params) {
        $result = pg_query($connection, $query);
    } else {
        $result = pg_query_params($connection, $query, $params);
    }
    if (!$result) {
        throw new Exception(pg_last_error($connection));
    }
    return $result;
}

