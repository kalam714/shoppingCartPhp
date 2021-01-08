<?php 
session_start();
require_once'./src/function.php';
require_once'./src/db.php';
$db=new DB();
if(isset($_POST['addToCart'])){
   // print_r($_POST['productId']);
   if(isset($_SESSION['cart'])){
       //print_r($_SESSION['cart']);
      

    $item_id=array_column($_SESSION['cart'],'productId');
    if(in_array($_POST['productId'],$item_id)){
        echo "<script>alert('product already added in the cart')</script>";
        echo "<script>window.location='index.php'</script>";

    }else{

        $count=count($_SESSION['cart']);
        $items=array(
            'productId'=>$_POST['productId']
        );
        $_SESSION['cart'][$count]=$items;
        print_r($_SESSION['cart']);
    }

    
   }else{
       $items=array(
           'productId'=>$_POST['productId']
       );
       $_SESSION['cart'][0]=$items;
      // print_r($_SESSION['cart']);
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once'./src/header.php'; ?>
<div class="container">
 <div class="row text-center py-5">
 <?php
 /*
 section('Foundation',400,'./images/1.jpeg');
 section('Makeup',700,'./images/2.jpeg');
 section('facewash',1200,'./images/3.jpeg');
 section('shampo',800,'./images/4.jpeg');
 */
$data=$db->getData();
while($row=mysqli_fetch_assoc($data)){
    section($row['product_name'],$row['product_price'],$row['photo'],$row['id']);
}



 ?>
 
 </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>