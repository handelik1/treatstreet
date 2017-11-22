<?php
require('connect.php');

$out .= '<nav class="navbar navbar-color navbar-edit">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a href = "index.php" class="navbar-brand brand-color" href="#">Treat Street</a>
		    </div>';

if(!isset($_SESSION['user'])){

$out .=		'<div class = "navbar-brand slogan">All Of Your Favorite Candies Wrapped Up In One Fun Place</div>';
}
if(isset($_SESSION['user']))
{
$out .=		  '<form action = "results.php" method = "post">
			    <ul class="nav navbar-nav">
			      <li><a href = "index.php" class = "home-button" href="#">Home</a></li>
			      <li class="dropdown">
			        <input class = "main-menu-item menu-item" type = "submit" value = "Chocolate">
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Milk">
			          <input class = "sub-menu menu-item" type = "submit" value = "White">
			          <input class = "sub-menu menu-item" type = "submit" value = "Dark">
			          <input class = "sub-menu menu-item" type = "submit" value = "Specialty">
			        </ul>
			      </li>
			      <li class="dropdown">
			        <input class = "main-menu-item menu-item" type = "submit" value = "Hard Candy">
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Lollipops">
			          <input class = "sub-menu menu-item" type = "submit" value = "Long-Lasting">
			          <input class = "sub-menu menu-item" type = "submit" value = "Mints">
			        </ul>
			      </li>
			      <li class="dropdown">
			        <input class = "main-menu-item menu-item" type = "submit" value = "Chewy">
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Caramel">
			          <input class = "sub-menu menu-item" type = "submit" value = "Taffy">
			          <input class = "sub-menu menu-item" type = "submit" value = "Chewing Gum">
			          <input class = "sub-menu menu-item" type = "submit" value = "Jelly Beans">
			          <input class = "sub-menu menu-item" type = "submit" value = "Gummies">
			        </ul>
			      </li>
			      <li class="dropdown">
			        <input class = "main-menu-item menu-item" type = "submit" value = "Holiday">
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Christmas">
			          <input class = "sub-menu menu-item" type = "submit" value = "Valentines">
			          <input class = "sub-menu menu-item" type = "submit" value = "Thanksgiving">
			          <input class = "sub-menu menu-item" type = "submit" value = "Halloween">
			        </ul>
			      </li>
			      <li class="dropdown">
			        <input class = "main-menu-item menu-item" type = "submit" value = "By Type" disabled>
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Sour">
			          <input class = "sub-menu menu-item" type = "submit" value = "Sugar Free">
			          <input class = "sub-menu menu-item" type = "submit" value = "Vintage">
			          <input class = "sub-menu menu-item" type = "submit" value = "Novelty">
			        </ul>
			      </li>
		    	</ul>
		       <input id = "candy-input" type = "hidden" name = "candy" value = "all">';
}
$out .=		   '<ul class="nav navbar-nav navbar-right">';
if(!isset($_SESSION['user'])){
$out .=		 '<li data-toggle="modal" data-target="#register-modal"><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
}
if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
$loggedQuery = mysqli_query($con, "select user_type from users where username = '$user'");
$user = mysqli_fetch_row($loggedQuery);
}
 if(isset($_SESSION['user']) && $user[0] == 'admin'){
$out .=		 '<li><a href="admin.php" class = "admin-link"><span class="glyphicon glyphicon-dashboard"></span> Admin</a></li>';
		}
if(isset($_SESSION['user'])){
$out .=		 '<li><a href="shopping-cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
$out .=		 '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
		}
$out .=		 '</ul>
			</form>
		  </div>
		</nav>';

?>

<script>
	$(document).ready(function(){
		$('.menu-item').click(function(){
			var val = $(this).val();
			var value = val.toLowerCase();
			$('#candy-input').val(value)
		});
	});
</script>


