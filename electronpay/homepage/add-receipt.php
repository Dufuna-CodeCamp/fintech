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
        businessname varchar(50) not null,
        clientname varchar(50) not null,
        txn_date DATETIME,
        addr varchar(100) not null,
        phone varchar(50) not null,
        email varchar(50) not null,
        ttype varchar(50) not null,
        iname varchar(50),
        iprice decimal(10, 2),
        iqty decimal(5, 2),
        itotal varchar(20),
        jname varchar(50),
        jprice decimal(10, 2),
        jqty decimal(5, 2),
        jtotal varchar(20),
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
    $sql = "INSERT INTO transactions(user_idd, businessname, clientname, txn_date, addr, phone, email, ttype, iname, iprice, iqty, itotal, jname, jprice, jqty, jtotal)
    VALUES($user_identity, :businessname, :clientname, :txn_date, :addr, :phone, :email, :ttype, :iname, :iprice, :iqty, :itotal, :jname, :jprice, :jqty, :jtotal)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('businessname', $_REQUEST['businessname']);
    $stmt->bindParam('clientname', $_REQUEST['clientname']);
    $stmt->bindParam('txn_date', $_REQUEST['txn_date']);
    $stmt->bindParam('addr', $_REQUEST['addr']);
    $stmt->bindParam('phone', $_REQUEST['phone']);
    $stmt->bindParam('email', $_REQUEST['email']);
    $stmt->bindParam('ttype', $_REQUEST['ttype']);
    $stmt->bindParam('iname', $_REQUEST['iname']);
    $stmt->bindParam('iprice', $_REQUEST['iprice']);
    $stmt->bindParam('iqty', $_REQUEST['iqty']);
    $stmt->bindParam('itotal', $_REQUEST['itotal']);
    $stmt->bindParam('jname', $_REQUEST['jname']);
    $stmt->bindParam('jprice', $_REQUEST['jprice']);
    $stmt->bindParam('jqty', $_REQUEST['jqty']);
    $stmt->bindParam('jtotal', $_REQUEST['jtotal']);
    
    $stmt->execute();
    echo "Records Inserted Successfully! <br>";
    echo "<a href='allREcords.php'>View all your records</a><br>";

} catch (PDOException $e) {
    die ("ERROR: Could not insert into table $sql " . $e->getMessage()) . "<br>";
}

?>