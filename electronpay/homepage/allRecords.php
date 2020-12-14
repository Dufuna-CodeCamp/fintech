<?php
include 'connect.php';
session_start();
$user_identity = $_SESSION['sess_id'];

try {
    $sql = "USE fintech";
    $pdo->exec($sql);
    echo "Using Database: fintech <br>";
    $sql = "SELECT * from transactions where `user_idd`=$user_identity";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        echo "<table style= 'border: 1px solid black'>";
        echo "<tr>";
            echo "<th style= 'border: 1px solid black'>Business Name</th>";
            echo "<th style= 'border: 1px solid black'>Client Name</th>";
            echo "<th style= 'border: 1px solid black'>Txn Date</th>";
            echo "<th style= 'border: 1px solid black'>Address</th>";
            echo "<th style= 'border: 1px solid black'>Phone Number</th>";
            echo "<th style= 'border: 1px solid black'>Email</th>";
            echo "<th style= 'border: 1px solid black'>Txn Type</th>";
            echo "<th style= 'border: 1px solid black'>Total Sum</th>";
        echo "</tr>";

        while ($row = $result->fetch()) {
            echo "<tr>";
                echo "<td style= 'border: 1px solid black'>" . $row['businessname'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['clientname'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['txn_date'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['addr'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['phone'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['email'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['ttype'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['itotal'] . "</td>";
            echo "<tr>";
        }
        echo "</table";
        unset($result);
    }
    else echo "No record found!";

} catch (PDOException $e) {
    echo "Error : ".$e->getMessage();
}
?>