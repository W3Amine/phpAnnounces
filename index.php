<?php 





require 'conn.php';



if(isset($_POST['valueSearch'])){

  $type = $_POST['type'];
  $priceMax = $_POST['priceMax'];
  $priceMin = $_POST['priceMin'];
  
  
  
  $sql= "SELECT * FROM `announces` WHERE `price` >= $priceMin   AND `price` <= $priceMax  AND `type`  = '$type' ";
  
  $statement = $conn->query($sql);
  
  // fetch all rows
  $searchResult = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  
  
  // echo "<pre>";
  
  // print_r($serchResult);
  
  // echo "</pre>";
  
  
  } else {










    

$pageId ;
if(isset($_GET['pageId'])){
  $pageId = $_GET['pageId'];
} else { 
  $pageId = 1 ;

}


$endIndex = $pageId * 8 ;
$StartIndex  = $endIndex - 8 ;


// $announcesDATA = $conn->query("SELECT * FROM announces");
$announcesDATA = $conn->query("SELECT * FROM announces Limit 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);

// echo $announcesDATA->rowCount();
// echo '<pre>';

// print_r($announcesDATA);

// echo '</pre>';



// $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
// $stmt->execute([$id]);



$sql = 'SELECT * FROM announces ';

// execute a query
$annoncesLength = $conn->query($sql)->rowCount();




// echo $annoncesLength[0];

$pagesNum = 0;

if(($annoncesLength % 6 ) == 0){

  $pagesNum = $annoncesLength / 8 ;

}  else{

  $pagesNum = ceil($annoncesLength / 8);


}








  }
  
  

  









?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Announce</title>
</head>

<body>
  <!-- nanbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Darek </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
        </ul>
        <span class="navbar-text">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ADDARTICAL">+Add
            Announce</button>

        </span>
      </div>
    </div>
  </nav>
  <!-- header -->

  <header class=" wrapper d-flex flex-column align-center mb-5">

    <h1 class="mb-2 font-weight-bold"> FInd <span class="text-success">your Dream home,!!</span> </h1>
    <h4 class="mb-2 font-weight-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.. </h4>

    <div class="wrapper wrapper--w1070 mt-5">
      <div class="card card-7">
        <div class="card-body d-flex row">
          <form class="form d-flex gap-2" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="input-group input--med">
              <label class="label">Category</label>
              <select class="form-select input-xs " name="type" id="category">
                <option selected>Category</option>
                <option value="Rent">Rent</option>
                <option value="Sale">SALE</option>
              </select>
            </div>
            <div class="input-group input--small">
              <label class="label">Max Price</label>
              <input class="input--style-1" type="number" name="priceMax" placeholder="Max price"
                id="minPrice">
            </div>
            <div class="input-group input--medium">
              <label class="label">Min Price</label>
              <input class="input--style-1" type="number" name="priceMin" placeholder="Min price"
                id="maxPrice">
            </div>
            <button class="btn-submit" name="valueSearch" type="submit" id="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <!-- modal create Announce start -->
    <div class="modal fade" id="ADDARTICAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Announce</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="addArticle.php" method="GET">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Announce Name :</label>
              <input type="text" name="annonceName" class="form-control" id="announce-name">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Announce Price :</label>
              <input type="number" name="announcePrice" class="form-control" id="announce-price">
            </div>
            <div class="mb-3">
              <div class="mb-3">
                <label for="recipient-name"  class="col-form-label">Announce Picture :</label>
                <input type="text" name="annonceImage" class="form-control" id="announce-pic" placeholder="Type URL here..">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce Category :</label>
                <select class="form-select input-xs " name="category" id="category">
                  <option selected>Category</option>
                  <option name="Sale" value="louer">A louer</option>
                  <option name="Rent" value="vendre">A vendre</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce Location :</label>
                <input type="text" name="annonceLocation"  class="form-control" id="announce-name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce space :</label>
                <input type="number" name="annonceSpace"  class="form-control" id="announce-name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce Date :</label>
                <input type="date" name="annonceDate" class="form-control" id="announce-date">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce Description :</label>
                <textarea class="form-control" name="annonceDesc" id="announce-desc"></textarea>
              </div>

            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                <input type="submit"  href="" name="add" class="btn btn-primary" value="Add">
              </div>
            </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
            <button type="button" class="btn btn-success" id="confirmUpdate">CREATE</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal create Announce start -->

  </header>
  <!-- header end -->



  <!-- Cards Section Begin -->
  <div class="container my-5">
    <div class="row">


    
    <?php


if(isset($_POST['valueSearch'])) {




  foreach ( $searchResult as $key => $value) {

    ?>
    
        <div class="col-md-3 col-sm-6 item">
    
    
    
    <div class="card item-card card-block ">
        <img src="<?php echo $value['image'] ?>" alt="Photo of house">
        <h5 class="item-card-title mt-3 px-2 "> <?php echo $value['title'] ?></h5>
        <h6 class="px-2"><?php echo $value['price'] ?><span>• <?php echo $value['type'] ?></span></h6>
        <p class="px-2"> Location : <span> <?php echo $value['adress'] ?></span> </p>
        <div class="dateArticle px-2 mb-3 "><span>Added:</span><?php echo $value['publishDate'] ?>
        </div>
        <p class="card-text px-2 mb-1"><?php echo substr( $value['description'], 0, 100) . '...'; ?></p>
        <!-- button cards update & delete -->
        <div class="groupBtn mb-3 p-2">
          <button class=" btn-success btn update" id="editBtn" onclick="editAnnonce(<?php echo $value['id']; ?>)"  data-bs-toggle="modal"
            data-bs-target="#updateModal">Update</button>
            <button data-bs-toggle="modal" onclick="deleteAnnonce(<?php echo $value['id']; ?>)" data-bs-target="#DeleteArticle" class=" btn-danger btn delete"
            id="delete">Delete</button>
            <a   href="detail.php?pageId= <?php echo $value['id']; ?>" class=" btn-danger btn delete"
            id="delete">Details</a>
        </div>
        
    </div>
    </div>
  
  
  
  
  
  
  
  
    <?php
  
  }
  




} else {



  foreach ( $announcesDATA as $key => $value) {

    ?>
    
        <div class="col-md-3 col-sm-6 item">
    
    
    
    <div class="card item-card card-block ">
        <img src="<?php echo $value['image'] ?>" alt="Photo of house">
        <h5 class="item-card-title mt-3 px-2 "> <?php echo $value['title'] ?></h5>
        <h6 class="px-2"><?php echo $value['price'] ?><span>• <?php echo $value['type'] ?></span></h6>
        <p class="px-2"> Location : <span> <?php echo $value['adress'] ?></span> </p>
        <div class="dateArticle px-2 mb-3 "><span>Added:</span><?php echo $value['publishDate'] ?>
        </div>
        <p class="card-text px-2 mb-1"><?php echo substr( $value['description'], 0, 100) . '...'; ?></p>
        <!-- button cards update & delete -->
        <div class="groupBtn mb-3 p-2">
          <button class=" btn-success btn update" id="editBtn" onclick="editAnnonce(<?php echo $value['id']; ?>)"  data-bs-toggle="modal"
            data-bs-target="#updateModal">Update</button>
            <button data-bs-toggle="modal" onclick="deleteAnnonce(<?php echo $value['id']; ?>)" data-bs-target="#DeleteArticle" class=" btn-danger btn delete"
            id="delete">Delete</button>
            <a   href="detail.php?pageId= <?php echo $value['id']; ?>" class=" btn-danger btn delete"
            id="delete">Details</a>
        </div>
        
    </div>
    </div>
  
  
  
  
  
  
  
  
    <?php
  
  }
  


}






?>

    




<br><br><br>


<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
?>

<nav class="mt-4 mb-4 " aria-label="Page navigation example">
  <ul class=" flex-wrap pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
<?php
for ($i=1; $i <= $pagesNum; $i++) { 
  ?>
    <li class="page-item"><a class="page-link" href="<?php echo "index.php?pageId=".$i?>"><?php echo $i ;?></a></li>

<?php

}

?>
    <li class="page-item"><a class="page-link" href="">Next</a></li>
  </ul>
</nav>
<?php

}

?>












      </div>
     

  <!-- Cards Section End -->



  <!-- delete modal -->
  <div class="modal fade" id="DeleteArticle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">delete article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure to delete this Article ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <a type="button"  href='' id="deleteBtn" class="btn btn-danger">DELETE ARTICLE</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Modal start -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Announce</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
      
        

        <form action="edit.php" method="GET">
      <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Announce Name :</label>
        <input type="text" name="annonceName" class="form-control" id="announce-Title">
      </div>
      <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Announce Price :</label>
        <input type="number" name="announcePrice" class="form-control" id="announce-price">
      </div>
      <div class="mb-3">
        <div class="mb-3">
          <label for="recipient-name"  class="col-form-label">Announce Picture :</label>
          <input type="text" name="annonceImage" class="form-control" id="announce-image" placeholder="Type URL here..">
        </div>
        <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Announce space :</label>
                <input type="number" name="annonceSpace"  class="form-control" id="announce-space">
              </div>
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Announce Category :</label>
          <select class="form-select input-xs " name="category" id="category">
            <option selected>Category</option>
            <option value="Sale">SALE</option>
            <option value="Rent">RENT</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Announce Location :</label>
          <input type="text" name="annonceLocation"  class="form-control" id="announce-local">
        </div>
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Announce Date :</label>
          <input type="date" name="annonceDate" class="form-control" id="announce-date">
        </div>
        <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Announce Description :</label>
          <textarea class="form-control" name="annonceDesc" id="announce-desc"></textarea>
        </div>
  <input type="hidden" name="id" id="hiddenId" value="">
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        
          <input type="submit"   name="save" class="btn btn-primary" value="Save"  >
        </div>
      </div>

 
      
    </form>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
          <button type="button" class="btn btn-primary" id="confirmUpdate">UPDATE</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Modal end-->


  <!-- Jquery script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://pagination.js.org/dist/2.5.0/pagination.min.js"></script>
  <!-- FontAwsome script -->
  <script src="https://kit.fontawesome.com/c7a60e43cd.js" crossorigin="anonymous"></script>

  <!--  Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <!--script js-->
  <script src="script.js"></script>


</body>

</html>
