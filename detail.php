<?php 

require 'conn.php';



// SELECT * FROM `annoce` LIMIT 6 OFFSET 0; 

if(isset($_GET["pageId"]) ){

$id = $_GET["pageId"];
    
    $sql = "SELECT * FROM `announces` WHERE id = $id " ;
    
    // execute a query
    $statement = $conn->query($sql);
    
    // fetch all rows
    $annonce = $statement->fetch(PDO::FETCH_ASSOC);
    
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap mt-3">
          <div class="site-navigation d-flex  justify-content-between">
            <a href="index.php" class="logo m-0 float-start">Property</a>
            <ul
              class="  site-menu mt-2 mx-auto">
              <div class="mt-3  d-flex ">
              <li><a href="index.php">Home</a></li>
              <li class="has-children ">
                <a href="#section" class="d-none d-md-flex">Properties |
                  <span class="spanNav  "><?php echo $annonce['adress'] ?></span>
                </a>
              </li>
              </div>
            </ul>

          </div>
        </div>
      </div>
    </nav>





  <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg')">
    <div class="container slideTop">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-9 text-center mt-5">
          <div class="row justify-content-center align-items-center mb-5">
            <h1 class="mt-5 text-light" >
            <?php echo $annonce['title'] ?>
            </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div id="section" class="section mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
              <div class="image">
                <img src="<?php echo $annonce['image'] ?>" alt="Image" class="img-fluid" />
              </div>
          </div>
          <div class="col-lg-4">
            <h3 class="meta"><?php echo $annonce['price'] ?> Dhs</h3>
            <p class="meta"><?php echo $annonce['adress'] ?></p>
            <p class="meta"><?php echo $annonce['surface'] ?>m²</p>
            <p class="meta"><?php echo $annonce['publishDate'] ?></p>
            <p class="text-black-50">
            <?php echo $annonce['description'] ?>
            </p>
          </div>
        </div>
      </div>
    </div>







  <script src="script.js"></script> 
<script src="https://kit.fontawesome.com/eec721374e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<?php 
}


else{


  echo "error";

  header("location:error.php");









}

?>






