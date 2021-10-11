<?php
include 'session.php';
include 'connect.php';

$date_poste = date("Y/m/d");
if (isset($_POST['submit'])) {
    $type_histoire = addslashes($_POST['elle']);
    $Limite_age = addslashes($_POST['belle']);
    $titre = addslashes($_POST['titre']);
    $description = addslashes($_POST['description']);
    $text_summernote = addslashes($_POST['editordata']);

    //ajout d'image
    // $target_dir = "picture/"; //dossier de reception
    // $temp = explode(".", $_FILES["image"]["name"]);
    // $newfilename = round(microtime(true)) . '.' . end($temp);
    // $finaldestination = $target_dir . $newfilename;
    //if (move_uploaded_file($_FILES["image"]["tmp_name"], "" . $finaldestination)) {
    //        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
    //    } else {
    //        echo "Sorry, there was an error uploading your file.";
    //}


    //ajout d'image

    $target_dir = "picture/"; //dossier de reception
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    //if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //renomer l'image
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $finaldestination = $target_dir . $newfilename;
    //}
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "" . $finaldestination)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $stitre = "insert into `histoire` (usern,type_histoire_id,Limit_age_id,titre,description,image,Text_histoire,Date_pub) values('$nom', '$type_histoire', '$Limite_age', '$titre', '$description', '$finaldestination', '$text_summernote', '$date_poste')";
    $ttitre = mysqli_query($con, $stitre);
    // $result=mysqli_query($con,$sql);
    // $age=mysqli_query($con,$sage);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ecriture</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body>

    <div class="container">
        <form method="post" enctype="multipart/form-data">

            <h1>Ecrire une Histoire</h1>
            <div class="row g-3 align-items-center center">
                <div class="col-auto">
                    <!-- <input type="text" name="type_histoire" class="form-control" aria-describedby="passwordHelpInline" placeholder="Type d'Histoire"> -->
                    <select name="elle" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected hidden>Type d'Histoire</option>
                        <?php
                        $sqlhistoire = "SELECT * FROM type";
                        $resulthistoire = $con->query($sqlhistoire);

                        if ($resulthistoire->num_rows > 0) {
                            // output data of each row
                            while ($rowhistoire = $resulthistoire->fetch_assoc()) {
                                $idhistoire = $rowhistoire["id"];
                                $typeh = $rowhistoire["type_histoire"];
                        ?>
                                <option value="<?php echo $typeh; ?>"><?php echo $typeh; ?></option>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>



                    </select>

                </div>
                <div class="col-auto">
                    <!-- <input type="text" name="Limite_age" class="form-control" aria-describedby="passwordHelpInline" placeholder="Limite d' Age"> -->
                    <select name="belle" class="form-select" aria-label="Default select example">
                        <option value="" disabled selected hidden>Limite d'Age</option>
                        <?php
                        $sqlage = "SELECT * FROM age";
                        $resultage = $con->query($sqlage);

                        if ($resultage->num_rows > 0) {
                            // output data of each row
                            while ($rowage = $resultage->fetch_assoc()) {
                                $idage = $rowage["id"];
                                $idlimiteage = $rowage["Limite_age"];
                        ?>
                                <option value="<?php echo $idlimiteage; ?>"><?php echo $idlimiteage; ?></option>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Titre" name="titre">
                </div>
                <div class="form-group">
                    <!-- <input type="text" class="form-control" placeholder="Description" name="description"> -->
                    <textarea class="form-control" placeholder="Description" id="floatingTextarea" name="description"></textarea>
                </div>
                <div class="mb-3 row my-2">
                    <label for="image" class="col-sm-2 col-form-label">Choisir une image</label>
                    <div class="col-sm-10">
                        <input type="file" id="image" placeholder="ajouter une photo" name="image">
                    </div>
                </div>

                <div>

                    <textarea id="summernote" name="editordata"></textarea>

                </div>
            </div>

            <button type="submit" class="btn btn-primary my-2" name="submit">Enregistrer</button>
            <!-- <input type="hidden" name="content" id="content"> -->
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Saisissez votre text ici',
                tabsize: 2,
                height: 120,
                toolbar: [
                    // ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    // ['insert', ['link', 'picture', 'video']],
                    // ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
<?php
$con->close();
?>

</html>