<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Connexion</title>
</head>

<body>
    <form action="" method="POST">

        <div class="container py-5">
            <h3> Bien venu dans le Temple des Histoire </h3>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Veillez saisir votre address email SVP">
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot De Passe</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Veillez saisir votre mot de passe SVP">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    session_start();
    //Inclusion de la connexion à la BD
    include 'connect.php';
    //login
    if (isset($_POST['submit'])) {
        $email = addslashes($_POST['email']);
        $motdepasse = md5(addslashes($_POST['motdepasse']));

        //check user
        $check = "SELECT * FROM user WHERE email ='$email' AND motdepasse = '$motdepasse' ";
        $result = mysqli_query($con, $check);
        $nombre = mysqli_num_rows($result);
        //a = 2
        //si a = 0 display 5 sinon display 4

        if ($nombre == 1) {
            //aller à la page 
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            //Création de la session
            $_SESSION["id"] = $id;
            header('Location: compte.php');
        } else {
            //afficher message d'erreure
            echo "mot de passe eronné";
        }
    }


    //fin login
    mysqli_close($con);
    ?>
</body>

</html>