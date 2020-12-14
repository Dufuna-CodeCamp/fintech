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
            echo "<th style= 'border: 1px solid black'>Txn Type</th>";
            echo "<th style= 'border: 1px solid black'>Description</th>";
            echo "<th style= 'border: 1px solid black'>Txn Amount</th>";
            echo "<th style= 'border: 1px solid black'>Tnx Date</th>";
        echo "</tr>";
        while ($row = $result->fetch()) {
            echo "<tr>";
                echo "<td style= 'border: 1px solid black'>" . $row['txn_type'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['descr'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['txn_amount'] . "</td>";
                echo "<td style= 'border: 1px solid black'>" . $row['txn_date'] . "</td>";
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