<?php
session_start();
include 'connect.php';
if(isset($_SESSION["id"])){
    $id_session_sauv = $_SESSION["id"];
    //Information Etudiant
    $check = "SELECT * FROM user WHERE id ='$id_session_sauv'";
    $result = mysqli_query($con, $check);// execution requet check
    $nombre = mysqli_num_rows($result);// nombre de resultat
    $row = mysqli_fetch_assoc($result);// sauv information des champs de la table dans row
    $id = $row['id'];
    $nom = $row['nom'];
    $prenoms = $row['prenoms'];
    $email = $row['email'];
    $motdepasse = $row['motdepasse'];

    echo 'WELCOME!!! '.$nom.'<br>';
    // echo date("Y/m/d"). " The time is " . date("h:i:sa");
    // echo date("Y-m-d h:i:sa");

}else{
    echo 'td';
}

?>