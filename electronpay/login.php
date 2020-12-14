<?php
    include 'connect.php';
    session_start();

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $alert = 0;
  if($username != "" && $password != "") {
    try {
      $sql = "USE fintech";
      $pdo->exec($sql);
      echo "Using Database: fintech <br>";
      $sql = "SELECT * from `users` where `username`=:username and `pass_word`=:password";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        $_SESSION['sess_id'] = $row['id'];
        $_SESSION['sess_name'] = $row['first_name'];

        echo "You have successfully logged in " . $_SESSION['sess_name'] .  "<a href='transaction.html'>Add Receipt</a> or <a href='allRecords.php'>Show Transactions</a>";
      } else {
        echo "Invalid username or password! <a href='login.html'>Please try again.</a>";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    echo "<script>alert('Both fields are required!')</script>";
    $alert++;
  }
  if ($alert > 0) {
    echo "<== <a href='login.html'>Go Back</a>";
    $alert = 0;
  }

?>