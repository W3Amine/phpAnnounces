<?php 
require 'conn.php';


// echo "<pre>";

// print_r($_GET);


// echo "</pre>";



$titre = $_GET['annonceName'];
$image = $_GET['annonceImage'];
$description = $_GET['annonceDesc'];
$space = $_GET['annonceSpace']; 
$adresse = $_GET['annonceLocation'];
$price = $_GET['announcePrice'];
$dateDannonce = $_GET['annonceDate'];
$type = $_GET['category'];



$sql = "INSERT INTO `announces` 
(`title`, `image`, `description`, `surface`, `adress`, `price`, `publishDate`, `type`) 
VALUES 
('$titre' , '$image', '$description', $space, '$adresse', $price, $dateDannonce, '$type')";

// $sql = "INSERT INTO `annoce` (`id`, `titre`, `image`, `description`, `space`, `adresse`, `price`, `dateDannonce`, `type`) VALUES (NULL, 'amina', 'xxxxx', 'xxxx', '44', 'qsdfqsfqsdqsdqsdqsd', '34', '2023-02-01', 'sale');";
    
    // execute a query
$conn->query($sql)->fetch();
    
    // fetch all rows
header("location:index.php");


