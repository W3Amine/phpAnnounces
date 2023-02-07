<?php 
require 'conn.php';


echo "<pre>";

print_r($_GET);


echo "</pre>";



$titre = $_GET['annonceName'];
$image = $_GET['annonceImage'];
$description = $_GET['annonceDesc'];
$space = $_GET['annonceSpace']; 
$adresse = $_GET['annonceLocation'];
$price = $_GET['announcePrice'];
$dateDannonce = $_GET['annonceDate'];
$type = $_GET['category'];
$id = $_GET['id'];






if ( true ){

    

    $sql = "UPDATE `announces` 
    SET `title` = '$titre', `image` = '$image', `description` = '$description', `adress` = '$adresse', `price` = '$price', `surface` = '$space', `publishDate` = '$dateDannonce', `type` = '$type'
    
    WHERE `announces`.`id` = $id; ";

    
    
    // execute a query
    $statement = $conn->query($sql)->execute();
    
    // fetch all rows
    header("location:index.php");

}







