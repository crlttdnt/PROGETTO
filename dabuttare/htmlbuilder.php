<?php
function buildTable($table, $columns, $result) {
    if (empty($result)) {
        echo "<p>No data available in table $table.</p>";
        return;
    }

   
    echo "<h4> " . ($table) . " </h4>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<tr>";
    echo "<form>";
    foreach ($columns as $column) {
        echo "<th>" . htmlspecialchars($column) . "</th>";
    }
    echo "<th>azioni</th>"; // Add an Actions column header
    echo "</form>";
    echo "</tr>";
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>" . htmlspecialchars($row[$column]) . "</td>";
        }
        // Add action buttons
        echo "<td>
                <a class='btn btn-primary btn-sm text-light'>Modifica</a>
                <button class='btn btn-danger btn-sm'>Cancella</button>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>