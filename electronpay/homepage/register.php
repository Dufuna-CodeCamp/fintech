<?php
include_once 'connect.php';

#Create Database
try {
    $sql = "CREATE DATABASE IF NOT EXISTS fintech";
    $pdo->exec($sql);
    echo "Database Created Successfully! <br>";
    $sql = "USE fintech";
    $pdo->exec($sql);
    echo "Using Database: fintech <br>";

} catch (PDOException $e) {
    die ("ERROR: Could not create database $sql " . $e->getMessage()) . "<br>";
}

#Create Table
try {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id int not null auto_increment,
        first_name varchar(50) not null,
        last_name varchar(50) not null,
        email varchar(50) not null,
        username varchar(50) not null,
        pass_word varchar(50) not null,
        gender varchar(10) not null,
        age int not null,
        created_at DATETIME,
        primary key(id)
        )";
    $pdo->exec($sql);
    echo "Table Created Successfully! <br>";

} catch (PDOException $e) {
    die ("ERROR: Could not create table $sql " . $e->getMessage()) . "<br>";
}


#Insert into Table
try {
    $sql = "INSERT INTO users(first_name, last_name, email, username, pass_word, gender, age, created_at)
    VALUES(:first_name, :last_name, :email, :username, :pass_word, :gender, :age, NOW())";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam('first_name', $_REQUEST['first_name']);
    $stmt->bindParam('last_name', $_REQUEST['last_name']);
    $stmt->bindParam('email', $_REQUEST['email']);
    $stmt->bindParam('username', $_REQUEST['username']);
    $stmt->bindParam('pass_word', $_REQUEST['password']);
    $stmt->bindParam('gender', $_REQUEST['gender']);
    $stmt->bindParam('age', $_REQUEST['age']);
    
    $stmt->execute();
    echo "Records Inserted Successfully! <br>";

} catch (PDOException $e) {
    die ("ERROR: Could not insert into table $sql " . $e->getMessage()) . "<br>";
}

?>