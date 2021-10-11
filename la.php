<?php
session_start();
ob_start();
//Vérrification de connection
include 'connect.php';
include 'session.php';


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .title {
      color: grey;
      font-size: 18px;
    }

    button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: black;
      background-color: #FFF;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    a {
      text-decoration: none;
      font-size: 22px;
      color: black;
    }

    button:hover,
    a:hover {
      opacity: 0.7;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="w3-container">
      <!-- Image and text -->
      <?php include 'menu.php'; ?>
      <?php include 'formpub.php';

      echo '<h2>Les Publications</h2>';
      //Selection et affichage de toutes les publications

      $sql = "SELECT* FROM publication ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) { // boucle

          //include 'publication.php';
          include 'publication2.php';
          //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        } //fin de la boucle
      } else {
        echo "0 results";
      }
ob_end_flush();
      ?>


    </div>
  </div>

</body>

</html>