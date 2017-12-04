<?php
require('connect.php');
$out .= '<nav class="navbar navbar-color navbar-edit">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a href = "index.php" class="navbar-brand brand-color" href="#">Treat Street</a>
		    </div>
			    <ul class="nav navbar-nav">
			      <li><a href = "admin.php" class = "home-button">Dashboard</a></li>
			      <li><a href = "new_product.php" class = "home-button">Add New Products</a></li>
			      <li><a href = "remove_product.php" class = "home-button">Remove Product</a></li> 
			      <li><a href = "orders.php" class = "home-button">View Orders</a></li> 
			      <li><a href = "hr.php" class = "home-button">Human Resources</a></li>         
		    	</ul>';
$out .=		 '<ul class="nav navbar-nav navbar-right">';
$out .=		  '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
$out .=		 '</ul>';
$out .=	 '</div>';
$out .=	'</nav>';

?>


