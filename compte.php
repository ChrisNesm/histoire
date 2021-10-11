<?php
include 'session.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  div {
    display: flex;
    align-items: center;
    justify-content: space-between;

  }
</style>

<body>
  <div class="container my-5">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">titre</th>
          <th scope="col">Description</th>
          <th scope="col">image</th>
          <th scope="col">Text_histoire</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM histoire WHERE usern ='$nom'";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $titre = $row['titre'];
            $description = $row['description'];
            $d = substr($description,0,30). '...';
            $image = $row['image'];
            // substr("Hello world",0,4)
            $Text_histoire = $row['Text_histoire'];
            $hi = substr($Text_histoire,0,100). '...';
            // $jdhd = $row['Text_histoire'];
            // $tdr = substr($Text_histoire, 0, 20) . '...';
            echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $titre . '</td>
            <td>' . $d . '</td>
            <td>' . $image . '</td>
            <td>' . 'Il étaiyt une fois ...' . '</td>
            <td>
            <div style="display: flex; justify-content: space-between;" >
          <a style="color: blue; cursor: pointer;">Editer</a>
          <a href="voir.php?userId=' . $id . '" style="color: green; cursor: pointer;">Voir</a></div>
          <a style="color: red; cursor: pointer;">Supprimer</a></div>
        </td>
          </tr>';
        //   echo $tdr;
          }
        }

        ?>


      </tbody>
    </table>
  </div>

</body>

</html>