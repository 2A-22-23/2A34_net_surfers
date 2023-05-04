<?php
$host = '127.0.0.1'; // Host name
$db_name = 'fitzone'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully!";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_REQUEST['search_number'])) {
  $n_cmd_search = $_REQUEST['search_number'];
  $stmt = $pdo->prepare("SELECT * FROM coach WHERE nom=:nom_search");
  $stmt->bindParam(':nom_search', $nom_search, PDO::PARAM_INT);
  if ($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      echo "<p>NOM: " . $row['name'] . "</p>";
      echo "<p>PRENOM: " . $row['prenom'] . "</p>";
      echo "<p>Email: " . $row['email'] . "</p>";
      echo "<p>MOTDEPASSE: " . $row['motdepasse'] . "</p>";
    } else {
      echo "<p> THIS N COMMAND NIOT FOUND IN YOU RECLAMATION </p>";
    }
  } else {
    echo "Error executing SQL statement: " . $stmt->errorInfo()[2];
  }
} else {
  echo "Missing parameter 'search_nom'.";
}
?>