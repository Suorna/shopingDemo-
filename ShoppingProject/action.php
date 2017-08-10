<?php
session_start();
include "db.php";

if(isset($_POST["category"])){
	$category_query= "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query);
	if (mysqli_num_rows($run_query)>0) {
		echo"

		<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Categories<h4></a></li>


		";

		while($row=mysqli_fetch_array($run_query)){
			$cid=$row["Cat_Id"];
			$cat_name=$row["Cat_Title"];
			echo "
				<li><a href='#' class='selectCategory' cid='$cid'>$cat_name</a></li>


			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query= "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	if (mysqli_num_rows($run_query)>0) {
		echo"

		<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Brands<h4></a></li>


		";

		while($row=mysqli_fetch_array($run_query)){
			$bid=$row["Brand_Id"];
			$brand_name=$row["Brand_Title"];
			echo "
				<li><a href='#' bid='$bid' class='selectBrand'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["page"])){
	
	$sql="SELECT * FROM products";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	$pageno= ceil($count/12);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}


if(isset($_POST["getProduct"])){
	
	$limit=12;
	if(isset($_POST["setPage"])){
		$pageno=$_POST["pageNumber"];
		$start= ($pageno*$limit)-$limit;
	}
	else{
		$start=0;
	}

	$product_query="SELECT * FROM products LIMIT $start,$limit";
	$run_query=mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query)>0)  {
		while ($row=mysqli_fetch_array($run_query)) {
			$prod_id=$row["Product_Id"];
			$prod_cat=$row["Product_Cat"];
			$prod_brand=$row["Product_Brand"];
			$prod_title=$row["Product_Title"];
			$prod_price=$row["Product_Price"];
			$prod_image=$row["Product_Image"];
			echo"
				<div class='col-md-3'>
									<div class='panel panel-info'>
										<div class='panel-heading'>$prod_title</div>
											<div class='panel-body'>
												<img class='img-responsive' src='Product_Images/Product_Thumbnail/$prod_image' style='width:200px; height:230px;' / >
													</div>
								<div class='panel-heading'>Rs.$prod_price
									<button pid='$prod_id' style='float: right;' id='productCart' class='btn btn-danger btn-xs'>AddToCart</button></div>
							</div>
						</div>
						


			";			
		}
	}
}

if(isset($_POST["get_selected_Category"]) || isset($_POST["get_selected_Brand"]) || isset($_POST["search"]) ){

	if(isset($_POST["get_selected_Category"])){
		$id=$_POST["cat_id"];
	$sql="SELECT * FROM products where Product_Cat='$id'";
	}
	elseif(isset($_POST["get_selected_Brand"])){
		$id=$_POST["brand_id"];
	$sql="SELECT * FROM products where Product_Brand='$id'";
	}
	else{
		$keyword=$_POST["keyword"];
	$sql="SELECT * FROM products where Product_keywords LIKE '%$keyword%' ";	
	}

	
	$run_query=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){ 
				
			$prod_id=$row["Product_Id"];
			$prod_cat=$row["Product_Cat"];
			$prod_brand=$row["Product_Brand"];
			$prod_title=$row["Product_Title"];
			$prod_price=$row["Product_Price"];
			$prod_image=$row["Product_Image"];
			echo"
				<div class='col-md-3'>
									<div class='panel panel-info'>
										<div class='panel-heading'>$prod_title</div>
											<div class='panel-body'>
												<img src='Product_Images/Product_Thumbnail/$prod_image' style='width:200px; height:230px;' / >
													</div>
								<div class='panel-heading'>Rs.$prod_price
									<button pid='$prod_id' style='float: right;' id='productCart' class='btn btn-danger btn-xs' >AddToCart</button></div>
							</div>
						</div>
						


			";			
		

	}
}

if(isset($_POST["addToProduct"])){

	if(isset($_SESSION["uid"])){

	$p_id=$_POST["prodId"];
	$user_id=$_SESSION["uid"];
	$sql="SELECT * FROM cart WHERE Product_Id='$p_id' AND User_Id='$user_id'" ;
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count>0){
		echo "<div class='alert alert-success'>
				<center><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b> !! Product already added to your cart, Continue Shopping... !!</b></center>
				</div";
	}
	else{
		$sql="SELECT * from products WHERE Product_Id='$p_id' ";
		$run_query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($run_query);
		$id=$row["Product_Id"];
		$prod_name=$row["Product_Title"];
		$prod_image=$row["Product_Image"];
		$prod_price=$row["Product_Price"];
		$sql="INSERT INTO `cart` (`ID`, `Product_Id`, `IP_Add`, `User_Id`, `Product_Title`, 
		`Product_Image`, `Qty`, `Price`, `Total_Amount`)
		 VALUES (NULL, '$p_id', '0', '$user_id', '$prod_name', 
		 '$prod_image', '1', '$prod_price', '$prod_price');";

		 if(mysqli_query($con,$sql)){
		 	echo "
		 		<div class='alert alert-success'>
				<center><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! Product added to your cart !!</b>
				</center></div>
						";
		 }
	}
}
else{
	echo "
		 		<div class='alert alert-danger'>
				<center><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!!Sorry..,You need to signup first!!</b>
				</center></div>
						";
}

}

if(isset($_POST["get_cart_product"]) || isset($_POST["cartCheckout"]) ){
	
	$uid=$_SESSION["uid"];
	$sql="SELECT * from cart WHERE User_Id='$uid'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count>0){
			$number=1;
			$total_amt=0;
			while($row=mysqli_fetch_array($run_query)){
				$id=$row["ID"];
				$pro_id=$row["Product_Id"];
				$pro_name=$row["Product_Title"];
				$pro_image=$row["Product_Image"];
				$qty=$row["Qty"];
				$pro_price=$row["Price"];
				$total=$row["Total_Amount"];
				$price_array=array($total);
				$total_sum=array_sum($price_array);
				$total_amt=$total_amt+$total_sum;
				

				if(isset($_POST["get_cart_product"])){
				echo 
				"
					<div class='row'>
					<div class='col-md-3'>$number</div>
					<div class='col-md-3'><img src='Product_Images/Product_Thumbnail/$pro_image' width='50px' height='60px'></div>
									<div class='col-md-3'>$pro_name</div>
									<div class='col-md-3'>$pro_price.00</div>
								</div>

				";
			$number=$number+1;	
				}

				if(isset($_POST["cartCheckout"]))
				{
					
					echo " <div class='row'>
							
							<div class='col-md-2'>$pro_name</div>
							<div class='col-md-2'><img src='Product_Images/Product_Thumbnail/$pro_image' width='60px' height='70px'></div>
							<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled> </div>
							<div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
							<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total'  disabled></div>
							<div class='col-md-2'>
								<div class='btn-group'>
									<a href='#' class='btn btn-danger remove' remove_id='$pro_id'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='#' class='btn btn-primary update' update_id='$pro_id'><span class='glyphicon glyphicon-ok-sign'></a>
								</div>
							</div>
						</div>" ;
				}



				
			}
			if(isset($_POST["cartCheckout"])){
				echo "<div class='row'>
							<div class='col-md-8'></div>
							<div class='col-md-2'><b>Total: Rs.$total_amt</b>
							</div>
							<div class='col-md-2'><input type='submit' class='btn btn-success' style='' id='buyitems' value='Buy'></div>

						</div> ";

			}
			
	}
}
if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
	$sql="SELECT * from cart WHERE User_Id='$uid'";
	$run_query=mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}

if(isset($_POST["removeItem"])){
	$pid=$_POST["removeId"];
	$uid=$_SESSION["uid"];
	$sql="DELETE FROM cart WHERE User_Id='$uid' AND Product_Id='$pid' ";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "
		 		<div class='alert alert-danger'>
				<center><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! Product removed from cart !!</b>
				</center></div>
						";
	}
}

if(isset($_POST["updateItem"])){
	$uid=$_SESSION["uid"];
	$pid=$_POST["updateId"];
	$qty=$_POST["qty"];
	$price=$_POST["price"];
	$total=$_POST["total"];

	$sql="UPDATE cart SET Qty='$qty',Price='$price', Total_Amount='$total' WHERE User_Id='$uid' AND Product_Id='$pid' ";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "<div class='alert alert-success'>
				<center><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! Update Successful !!</b></center>
				</div>";


	}

}
?>