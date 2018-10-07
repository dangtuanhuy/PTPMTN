<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyWEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h3>Home|<a href="?page=pro">Products</a>|<a href="?page=cate">Category</a></h3>
    <?php 
     $conn = new mysqli("localhost", "root", "", "shoppingcart");
    
     /* check connection */
     if ($conn->connect_errno) {
         printf("Connect failed: %s\n", $conn->connect_error);
         exit();
     }
    mysqli_set_charset($conn,'utf8');
    ?>
    <?php
    if (isset($_GET['page']))
      {
        $page = $_GET['page'];
        if ($page === "cate") {
          include_once("category.php");
        }
        if ($page === "addcate") {
          include_once("addCategory.php");
        }
        if ($page === "Updatecate") {
          include_once("updateCategory.php");
        }
        if ($page === "pro") {
          include_once("products.php");
        }
        if ($page === "addpro") {
          include_once("addProducts.php");
        }
        if ($page === "Updatepro") {
          include_once("updateProduct.php");
        }
    }
    else
    include_once("body.php");
        ?>
       
</body>
</html>