<?php
include_once 'connect.php';
session_start();
$user_identity = $_SESSION['sess_id'];

#Create Table
try {
    $sql = "USE fintech";
    $pdo->exec($sql);
    echo "Using Database: fintech <br>";
    $sql = "CREATE TABLE IF NOT EXISTS transactions (
        id int not null auto_increment,
        user_idd int not null,
        txn_type varchar(50) not null,
        descr varchar(100) not null,
        txn_amount decimal(20, 2) not null,
        txn_date DATETIME,
        primary key(id),
        foreign key(user_idd) references users(id)
        )";
    $pdo->exec($sql);
    echo "Table Created Successfully! <br>";

} catch (PDOException $e) {
    die ("ERROR: Could not create table $sql " . $e->getMessage()) . "<br>";
}

#Insert into Table
try {
    $sql = "INSERT INTO transactions(user_idd, txn_type, descr, txn_amount, txn_date)
    VALUES($user_identity, :txn_type, :descr, :txn_amount, :txn_date)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('txn_type', $_REQUEST['ttype']);
    $stmt->bindParam('descr', $_REQUEST['descr']);
    $stmt->bindParam('txn_amount', $_REQUEST['tamount']);
    $stmt->bindParam('txn_date', $_REQUEST['tdate']);
    
    $stmt->execute();
    echo "Records Inserted Successfully! <br>";
    echo "<a href='allREcords.php'>View all your records</a><br>";

} catch (PDOException $e) {
    die ("ERROR: Could not insert into table $sql " . $e->getMessage()) . "<br>";
}

?>