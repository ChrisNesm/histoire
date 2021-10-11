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
    <link href="style.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="style.css" rel="stylesheet" /> -->
    <title>Lire</title>

</head>
<style>
    body {
        margin: 0;
        padding: 0;
        /* background: red !important; */
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .row {
        max-width: 500px;
        max-height: 500px;
        /* background-color: blue; */
    }
    .row .text{
        position: relative;
        left: 410px;
    }

    .row .image {
        min-width: 500px;
        height: 350px;
    }

    .row .image img {
        width: 100%;
        height: 100%;
    }

    .row .title {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .row .scroll-bar{     margin-top:15px;     margin-left:0;     float:left;     height:350px;     width:500px;     background-color:#f5f5f5;     overflow-y:scroll;     margin-bottom:25px;     text-align: left;     padding: 10px; }

    /* .scroll-bg {

        width: 100%;
        height: 150px;
        margin: 10% auto;
        /* padding: 20px;
    border-radius: 50px; */
    /* } */

    /* .scroll-div {
        width: 100%;
        height: 150px;
        height: 350px;
        overflow: hidden;
        overflow-y: scroll; */
    /* } */

    /* .row .text .scroll-object {
        color: rgb(20, 19, 19);
        margin-bottom: 4rem;
        font-family: 'Times New Roman', Times, serif;
        font-size: 15px;
        padding: 20px;
    } */
</style>

<body>


    <?php
    if (isset($_POST['lire'])) {
        $id = $_POST['lireid'];




        $sqll = "SELECT * FROM histoire where id = '$id'";
        $resultl = mysqli_query($con, $sqll);

        if (mysqli_num_rows($resultl) > 0) {
            // output data of each row
            while ($rowa = mysqli_fetch_assoc($resultl)) {




    ?>

                <!-- <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div> -->
                <div class="row">
                    <div class="title">
                        <h1><?php echo $rowa['titre']; ?></h1>
                        <h6><?php echo $rowa['Date_pub']; ?></h6>
                    </div>
                    <div class="text">
                        <h4><?php echo 'Par : '.$rowa['usern']; ?></h4>
                    </div>
                    <div class="image">
                        <img src="<?php echo $rowa['image']; ?>" alt="..." style="object-fit: cover">
                    </div>
                    <div class="scroll-bar">
                        <p><?php echo $rowa['Text_histoire']; ?></p>
                    </div>

                </div>

    <?php
            }
        }
    } else {
        echo "0 results";
    }
    ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
</body>


</html>