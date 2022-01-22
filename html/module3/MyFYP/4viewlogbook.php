<?php

include_once $_SERVER["DOCUMENT_ROOT"] .  '/mySQLi/config.php';

$sql = "SELECT * FROM project_logbook";
$result = $db->query($sql);
echo "<div class='container'>";
echo "<form>";
echo "<table class = 'dl' width=max-content border=1 cellspacing=0 cellpadding=10>";
if ($result->num_rows > 0) {
    echo "<tr>";
    echo "<th>Date</th>";
    echo "<th>Activity</th>";
    echo "</tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["logbook_date"] . "</td>";
        echo "<td>" . $row["logbook_details"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$db->close();
echo "</form>";
echo "</div>";

?>