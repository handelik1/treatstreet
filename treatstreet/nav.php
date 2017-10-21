<?php

$out .= '<nav class="navbar navbar-color navbar-edit">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a href = "index.php" class="navbar-brand brand-color" href="#">Treat Street</a>
		    </div>
		      <form action = "results.php" method = "post">
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
			        <input class = "main-menu-item menu-item" type = "submit" value = "By Type">
			        <span class="caret"></span>
			        <ul class="dropdown-menu">
			          <input class = "sub-menu menu-item" type = "submit" value = "Sour">
			          <input class = "sub-menu menu-item" type = "submit" value = "Sugar Free">
			          <input class = "sub-menu menu-item" type = "submit" value = "Vintage">
			          <input class = "sub-menu menu-item" type = "submit" value = "Novelty">
			        </ul>
			      </li>
		    	</ul>
		       <input id = "candy-input" type = "hidden" name = "candy" value = "all">
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
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
