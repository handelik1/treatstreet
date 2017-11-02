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
$out .= 			 '<h1>Add New Product</h1>';
$out .=			'</div>';
$out .=     '</div>';

$out .=		'<div class="row">';
$out .=			'<div class="col-md-6">';
$out .= 		  '<form class = "add_product_form" id = "add_product_form" action = "add_product.php" method = "post" enctype="multipart/form-data">';		 	
$out .=				'<label class = "new_product_label">Name</label><input name = "new_name" class = "new_product_input" type = "text" required></input><br><br>';
$out .=				'<label class = "new_product_label">Description</label><input name = "new_description" class = "new_product_input" type = "text" required></input><br><br>';
$out .=				'<label class = "new_product_label">Price</label><input name = "new_price" class = "new_product_input" type = "text" required></input><br><br>';
$out .=				'<label class = "new_product_label">Quantity</label><input name = "new_quantity" class = "new_product_input" type = "text" required></input><br><br>';
$out .=			'</div>';

$out .=			'<div class="col-md-6">';
$out .=			 '<div class = "row">';

$out .=			   '<div class="col-md-6">';
$out .=				'<label class = "new_product_label">Main Type</label><br><br>';
$out .= 				'<input type="checkbox" name="type_list[]" value="chocolate"><label class = "new_product_label">Chocolate</label><br>
						 <input type="checkbox" name="type_list[]" value="hard candy"><label class = "new_product_label">Hard Candy</label><br>
						 <input type="checkbox" name="type_list[]" value="chewy"><label class = "new_product_label">Chewy</label><br>
						 <input type="checkbox" name="type_list[]" value="holiday"><label class = "new_product_label">Holiday</label><br>';
$out .=				'<label class = "new_product_label image-upload">Image (.jpg, .jpeg, or .png)</label>';
$out .= 				'<input type="hidden" name="MAX_FILE_SIZE" value="200000000">';
$out .= 				'<input type="file" class = "image-upload-button" name="new_image" accept=".png" required>';
$out .=			   '</div>';

$out .=			   '<div class="col-md-6">';
$out .=				'<label class = "new_product_label">Sub Type</label></br><br>';
$out .=				  '<div class = "sub-type-wrapper">';
$out .= 				'<input class = "new_product_label" type="checkbox" name="type_list[]" value="milk"><label class = "new_product_label">Milk</label><br>
						 <input type="checkbox" name="type_list[]" value="white"><label class = "new_product_label">White</label><br>
						 <input type="checkbox" name="type_list[]" value="dark"><label class = "new_product_label">Dark</label><br>
						 <input type="checkbox" name="type_list[]" value="specialty"><label class = "new_product_label">Specialty</label><br>
						 <input type="checkbox" name="type_list[]" value="lollipops"><label class = "new_product_label">Lollipops</label><br>
						 <input type="checkbox" name="type_list[]" value="long-lasting"><label class = "new_product_label">Long-Lasting</label><br>
						 <input type="checkbox" name="type_list[]" value="mints"><label class = "new_product_label">Mints</label><br>
						 <input type="checkbox" name="type_list[]" value="caramel"><label class = "new_product_label">Caramel</label><br>
						 <input type="checkbox" name="type_list[]" value="taffy"><label class = "new_product_label">Taffy</label><br>
						 <input type="checkbox" name="type_list[]" value="chewing gum"><label class = "new_product_label">Chewing Gum</label><br>
						 <input type="checkbox" name="type_list[]" value="jelly beans"><label class = "new_product_label">Jelly Beans</label><br>
						 <input type="checkbox" name="type_list[]" value="gummies"><label class = "new_product_label">Gummies</label><br>
						 <input type="checkbox" name="type_list[]" value="christmas"><label class = "new_product_label">Christmas</label><br>
						 <input type="checkbox" name="type_list[]" value="valentines"><label class = "new_product_label">Valentines</label><br>
						 <input type="checkbox" name="type_list[]" value="thanksgiving"><label class = "new_product_label">Thanksgiving</label><br>
						 <input type="checkbox" name="type_list[]" value="halloween"><label class = "new_product_label">Halloween</label><br>
						 <input type="checkbox" name="type_list[]" value="sour"><label class = "new_product_label">Sour</label><br>
						 <input type="checkbox" name="type_list[]" value="sugar free"><label class = "new_product_label">Sugar Free</label><br>
						 <input type="checkbox" name="type_list[]" value="vintage"><label class = "new_product_label">Vintage</label><br>
						 <input type="checkbox" name="type_list[]" value="novelty"><label class = "new_product_label">Novelty</label><br>';
$out .=				  '</div>';
$out .=              '<input form = "add_product_form" type="submit" id = "submit" class="new_product_button" value="Submit">';
$out .=			     '</div>';
$out .=			 '</div>';
$out .=			'</div>';

$out .=		  '</form>';
$out .=     '</div>';

$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>