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
						require('admin-nav.php');
$out .=				'</div>';
$out .=     	'</div>';

$out .=		'<div class="row">';
$out .=			'<div class="col-md-12">';
$out .= 			 '<h1>Remove Products</h1>';
$out .=			'</div>';
$out .=     '</div>';


$out .=	'<div class="row">';

$out .=		'<div class="col-md-2">';
$out .=				'<div class = "remove-back-button-wrapper">';
$out .=					'<a class = "back-button" href = "admin.php">Back</a>';
$out .=				'</div>';
$out .=		'</div>';

$out .=		'<div class="col-md-8">
				<form id = "search-form" class = "search-form-results text-center" action="remove_product.php" method="post">
					<input type = "hidden" name = "remove" value = "remove">
					<input class = "search-bar-results" placeholder = "Search for Candy" type = "text" name = "candy-search" required><br>
					<input form = "search-form" class = "remove-button-results" type = "submit" value = "Go">
				</form>					
			</div>';

if(isset($_POST['remove'])){
	$remove = mysqli_real_escape_string($con,$_POST['remove']);
}
if(isset($remove)){

$candy= mysqli_real_escape_string($con,$_POST['candy-search']);

$candyQuery = mysqli_query($con, "select * from candy where name like '%".$candy."%' or description like '%".$candy."%'");

$count= mysqli_num_rows($candyQuery);

$out .=	'<div class="row">';

		$out .=		'<div class="col-md-2">';
		$out .=		'</div>';

		$out .=		'<div class="col-md-8">';
		$out .= '<div class = "remove-wrapper-wrapper">';
		$out .= 	'<div class = "remove-wrapper">';
		$out.= 			'<form onsubmit= "return sure()" id = "remove_candy_form" class = "candy-form-results" action="remove_candy.php" method="post">';
					$out .=		'<input type = "hidden" name = "remove_candy">';
					if($count > 0){
						$c = 0;
							foreach ($candyQuery as $key => $value) {
							$out .=		'<div class="col-md-12">';
								$out .= 		'<div class = "result" id = "result'.$c.'">';
								$out .=			'<h4 class = "remove-title remove-item" id = "remove-title'.$c.'">'.$value['name'].'</h4>';
								$out .= 		'<input class = "remove-check" type = "checkbox" name = "check_candy[]" value = "'.$value['name'].'">';
								$out .=			'</div>';
							$out .= '</div>';
							$c++;
							}
							$out.= '</form>';
					}
					else{
						$out .=		'<div class="col-md-12">';
						$out .= 		'<h1>No results</h1>';
						$out .=		'</div>';
				}

		$out .= 	'</div>';
		$out .=	'</div>';

		$out .=	'</div>';

		$out .=		'<div class="col-md-2">';
		$out .=		'</div>';

		$out .=	'</div>';
	}

$out .=		'<div class="col-md-2">';
$out .=			'</div>';

$out .=	'</div>';

$out .=	'<div class = "row">';
$out .=		'<div class = "col-md-12">';
$out .=			'<div class = "remove-button-wrapper text-center">';
$out .=      		'<input form = "remove_candy_form" type="submit" id = "submit" class="remove-candy-button text-center" value="Remove" ">';
$out .=			'</div>';
$out .=		'</div>';
$out .=	'</div>';




$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>