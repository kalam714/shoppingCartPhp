<?php
function section($name,$price,$image,$productId){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
 <form action=\"index.php\" method=\"post\">
 <div class=\"card shadow\">
 <div>
 <img src='$image' class=\"img-fluid card-img-top\">
 </div>
 <div class=\"card-body\">
 <h4 class=\"card-title\">$name</h4>
 <h6>
 <i class=\"fas fa-star\"></i>
 <i class=\"fas fa-star\"></i>
 <i class=\"fas fa-star\"></i>
 <i class=\"fas fa-star\"></i>
 <i class=\"far fa-star\"></i>
 </h6>
 <p class=\"card-text\">Lorem ipsum dolor sit amet consectetur</p>
<h5>
<span class=\"price\">BDT $price</span>
</h5>
<button type=\"submit\" class=\"btn btn-primary my-3\" name=\"addToCart\">Add To Cart <i class=\"fas fa-shopping-cart\"></i></button>
<input type=\"hidden\" name=\"productId\" value=\"$productId\">

 </div>
 </div>
 </form>

 </div>
    ";
    echo $element;
}