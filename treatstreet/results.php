<?php
$out = '';
if(session_status() == PHP_SESSION_NONE){
session_start();
}
require('connect.php');

require('header.html');



$out = '';
$out .= '<body>';
$out .= 	'<div class="container">';
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<img class = "background" src = "src/img/background.jpg">';
$out .=				'</div>';
$out .=     	'</div>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
						require('nav.php');
$out .=				'</div>';
$out .=     	'</div>';

if(isset($_POST['candy-search'])){

$candy = strip_tags(mysqli_real_escape_string($con,$_POST['candy-search']));

$candyQuery = mysqli_query($con, "select * from candy where name like '%".$candy."%' or description like '%".$candy."%'");

	$count= mysqli_num_rows($candyQuery);
	//checks if row is queried
	if($count>0){
			$out .=		'<div class = "full-results-wrapper">';
		foreach($candyQuery as $key => $value){

			if($value['inventory'] > 0){
				$out .= 		'<div class="row">';
				$out .=		    	'<div class="col-md-2">';
				$out .=				  '<div class = "image-wrapper">';
				$out .=					'<img class = "product-image" src = "src/img/'.$value['image'].'">';
				$out .=				  '</div>';
				$out .=				'</div>';

				$out .=		    	'<div class="col-md-8">';
				$out .=					'<h4 class = "candy">'.$value['name'].'</h4>';
				$out .=					'<p class = "candy">'.$value['description'].'</p>';
				$out .=					'<h5 class = "candy">Stock: '.$value['inventory'].'</h5>';
				$out .=				'</div>';

				$out .=		    	'<div class="col-md-2">';
				$out .=				  '<div class = "result-wrapper">';
				$out .=					'<h4 class = "candy" id = "item-price">$'.$value['price'].' each</h4>';
				$out .=					'<form class = "add-to-cart-form" action = "shopping-cart.php" method = "post">';
				$out .=						'<input name = "add-candy" type = "hidden" value = '.$value['id'].'</input>';
				$out .=						'<input class = "add-to-cart btn" type = "submit" value = "Add to Cart"></input>';
				$out .=					'</form>';
				$out .=				  '</div>';
				$out .=				'</div>';
				$out .=     	'</div>';
				$out .=			  '<hr class = "product-break">';
			}
		}	
				$out .=		'</div>';	
	}
	else{
		$out .= 		'<div class="row">';
		$out .=		    	'<div class="col-md-12">';
		$out .=				  '<div class = "no-results-wrapper">';
		$out .=					'<h1 class = "candy">No Results</h1>';
		$out .=				  '</div>';
		$out .=				'</div>';
		$out .=     	'</div>';
	}
}

if(isset($_POST['candy'])){

$candy = strip_tags(mysqli_real_escape_string($con,$_POST['candy']));

$candyQuery = mysqli_query($con, "select tid from types where type = '$candy'");

	if(mysqli_num_rows($candyQuery) > 0){
			$out .=		'<div class = "full-results-wrapper">';
		foreach($candyQuery as $key => $value){
			$id = $value['tid'];
			$candyQuery = mysqli_query($con, "select * from candy where id = $id");
			$value = mysqli_fetch_assoc($candyQuery);
			if($value['inventory'] > 0){
				$out .= 		'<div class="row">';
				$out .=		    	'<div class="col-md-2">';
				$out .=				  '<div class = "image-wrapper">';
				$out .=					'<img class = "product-image" src = "src/img/'.$value['image'].'">';
				$out .=				  '</div>';
				$out .=				'</div>';

				$out .=		    	'<div class="col-md-8">';
				$out .=					'<h4 class = "candy">'.$value['name'].'</h4>';
				$out .=					'<p class = "candy">'.$value['description'].'</p>';
				$out .=					'<h5 class = "candy">Stock: '.$value['inventory'].'</h5>';
				$out .=				'</div>';

				$out .=		    	'<div class="col-md-2">';
				$out .=				  '<div class = "result-wrapper">';
				$out .=					'<h4 class = "candy" id = "item-price">$'.$value['price'].' each</h4>';
				$out .=					'<form class = "add-to-cart-form" action = "shopping-cart.php" method = "post">';
				$out .=						'<input name = "add-candy" type = "hidden" value = '.$value['id'].'</input>';
				$out .=						'<input class = "add-to-cart btn" type = "submit" value = "Add to Cart"></input>';
				$out .=					'</form>';
				$out .=				  '</div>';
				$out .=				'</div>';
				$out .=     	'</div>';
				$out .=			  '<hr class = "product-break">';
			}
		}	
				$out .=		'</div>';	
	}
	else{
		$out .= 		'<div class="row">';
		$out .=		    	'<div class="col-md-12">';
		$out .=				  '<div class = "no-results-wrapper">';
		$out .=					'<h1 class = "candy">No Results</h1>';
		$out .=				  '</div>';
		$out .=				'</div>';
		$out .=     	'</div>';
	}
}



$out .= 	'</div>';
$out .= '</body>';

echo $out;

mysqli_close($con);

	
require('footer.html');

?>

<script>
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).fadeIn(50);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).fadeOut(50);
});
</script>
