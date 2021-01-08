<?php 
session_start();
require_once'./src/db.php';
$db=new DB();
if(isset($_POST['remove'])){
   // print_r($_GET['id']);
   if($_GET['action']=='remove'){
       foreach($_SESSION['cart'] as $key=>$value){
           if($value['productId']==$_GET['id']){
               unset($_SESSION['cart'][$key]);
               echo "<script>alert('Product will be removed...')</script>";
               echo "<script>window.location='cart.php'</script>";
           }
       }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<?php require_once'./src/header.php'; ?>
<div class="container">
 	
 
<?php if(isset($_SESSION['cart'])){
    $productId=array_column($_SESSION['cart'],'productId');
    $data=$db->getData();
    $total=0;
    while($row=mysqli_fetch_assoc($data)){
        foreach($productId as $id){
            if($row['id']==$id){
                $total=$total+ (int)$row['product_price'];
                ?>

<div class="row justify-content-center">
 		<div class="col-md-8">
 		
 			<div class="card mb-3">
 				<div class="card-body">
 				
 					<span class="float-right">
 						<img src="<?php echo $row['photo']; ?>"  width="100">
 					</span>

 					<p>Name:<?php echo $row['product_name'];?></p>
 					<p>price:<?php echo $row['product_price'];?></p>
    <form action="cart.php?action=remove&id=<?php echo $row['id'];?>" method="POST">
      <button class="btn btn-danger">Remove</button>
    </form>

 			
 					
 				</div>

 			</div>
 			<p>
 				<button type="button" class="btm btn-info" style="color: #fff;">
 					<span class="">
 					
                     </span>
                     
 				</button>
 			</p>
 		
 		
 		</div>
 	</div>
 	


 
             
              <?php 
            }
        }
    }


  

}else{
    echo "Cart is empty";
}
?>
<p>
 				<button type="button" class="btm btn-info" style="color: #fff;">
 					<span class="">
                        <?php 
                        if(isset($_SESSION['cart'])){
                            echo count($_SESSION['cart'] )." itmes ";
                           echo "Total Price:". $total;
                        }
                        ?>
 						
                     </span>
                     
 				</button>
 			</p>

</div>
 </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>