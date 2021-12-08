<?php
session_start();
$pincode=$_SESSION['pincode'];
$search= $_GET['search'];

include('database_connection.php');

if(isset($_GET["action"]))
{
	$query = "
		SELECT * FROM product WHERE (product_category like '%{$search}%' OR product_name like '%{$search}%') AND product_pincode=$pincode
	";
	if(isset($_GET["minimum_price"], $_GET["maximum_price"]) && !empty($_GET["minimum_price"]) && !empty($_GET["maximum_price"]))
	{
		$query .= "
		 AND product_price BETWEEN '".$_GET["minimum_price"]."' AND '".$_GET["maximum_price"]."'
		";
	}
	if(isset($_GET["brand"]))
	{
		$brand_filter = implode("','", $_GET["brand"]);
		$query .= "
		 AND product_brand IN('".$brand_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$id=$row['product_id'];
			echo "
			<a href='http://localhost/zebodo/components/product.php?id=$id'>
			";

			echo '<div class="col-sm-4 col-lg-4 col-md-4">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="'. $row['product_image'] .'" alt="" class="img-responsive"  style="height:300px">
					<p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
					<p>
					Brand : '. $row['product_brand'] .' <br /> </p>
				</div>

			</div>
			</a>
			';
		}
	}
	else
	{
		echo '<h3>No Data Found</h3>';
	}
}

?>