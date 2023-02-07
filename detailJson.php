<?php 

require "connect.php";


// SELECT * FROM `annoce` LIMIT 6 OFFSET 0; 

if(isset($_GET["pageId"]) ){

$id = $_GET["pageId"];
    
    $sql = "SELECT * FROM `announces` WHERE id = $id " ;
    
    // execute a query
    $statement = $conn->query($sql);
    
    // fetch all rows
    $annonce = $statement->fetch(PDO::FETCH_ASSOC);


    header('Content-Type: application/json');


    echo json_encode($annonce);

}





?>