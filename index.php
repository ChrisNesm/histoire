<?php
session_start();
include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Choisir</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body>

    <section>
        <!-- <div class="container py-5 col-md-8 mx-auto">
            <div class="row">

                
                    <div class="card p-5 mx-2 my-2" style="width: 18rem;">
                        <img src="picture/1632311930.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titre</h5>
                            <h5 class="card-title">Description</h5>
                            <p class="card-title">Text gqdsm fqdh fqdfh gshdg gshdf</p>
                            <a href="#" class="btn btn-primary">Lire l'histoire</a>
                        </div>
                    </div>
                

            </div>
            
        </div> -->



        <form action="recherche.php" method="POST">
            <div class="mb-3 my-2 row">
                <div class="col-auto">
                    <?php
                    $sqla = "SELECT * FROM histoire";
                    $resulta = mysqli_query($con, $sqla);
                    $num = mysqli_num_rows($resulta);

                    ?>
                    <h4 class="card-title"><?php echo $num . ' Histoires' ?></h4>
                </div>
                <div class="col-sm-8">
                    <input type="search" name="search" class="form-control" id="search">
                </div>
                <div class="col-auto">
                    <input type="hidden" name="searchid" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Recherche</button>
                </div>
                <div></div>
            </div>
        </form>

        <div class="row ">

            <?php

            $sql = "SELECT * FROM histoire";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {




            ?>
                <!-- <div class="card mb-3 mx-2" style="max-width: 540px;"> -->

                <div class="card ml-2 mx-2 mb-2 mt-0" style="max-width: 485px; max-height: 400px">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['titre']; ?></h2>
                                <div class="row">
                                    <p>
                                        <span class="h6">Type : </span>
                                        <span><?php echo $row['type_histoire_id']; ?></span>
                                    </p>
                                </div>
                                <div class="row">
                                    <p>
                                        <span class="h6">Âge : </span>
                                        <span><?php echo $row['Limit_age_id']; ?></span>
                                    </p>
                                </div>
                                <div class="row">
                                    <p>
                                        <span class="h6">Description : </span>
                                        <span><?php echo $row['description']; ?></span>
                                    </p>
                                </div>
                                <?php
                                $jdhd = $row['Text_histoire'];
                                $tdr = substr($jdhd, 0, 15) . '...';
                                ?>
                                <p class="card-text"><?php echo $tdr; ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo  'Publier le ' . $row['Date_pub']; ?></small></p>
                                <form action="lire.php" method="POST">
                                    <input type="hidden" name="lireid" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="lire" class="btn btn-primary">Lire l'histoire</button>

                                </form>




                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo $row['image']; ?>" class="img-fluid rounded-start mt-2 h-75" alt="..." style="object-fit: cover">
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <?php
        // $qsl = "Select * from `pagination` limit 0,5";
        $qsl = "Select * from `histoire`";
        $result = mysqli_query($con, $qsl);
        $num = mysqli_num_rows($result);
        $numberPages = 4;
        $totalPages = ceil($num / $numberPages);
        echo $totalPages;
        // Boutton de pagination
        for ($btn = 1; $btn <= $totalPages; $btn++) {
            echo '<button class="btn btn-info mx-1 mb-1"><a href="index.php?page=' . $btn . '" class="text-light">' . $btn . '</a></button>';
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            // echo $page;
            $startinglimit = ($page - 1) * $numberPages;
            // echo $startinglimit;
            $sql = "Select * from `histoire` limit " . $startinglimit . ',' . $numberPages;
            $result = mysqli_query($con, $sql);

            echo $num;
        }
        ?>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
        </script>
</body>


</html>