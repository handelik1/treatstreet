<?php
$out = '';
if(session_status() == PHP_SESSION_NONE){
session_start();
}
require('connect.php');

require('header.html');

$out = '';
$out .= '<body class = "admin-body">';
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

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<h1>Human Resouces</h1>';
$out .=				'</div>';
$out .=     	'</div>';

				$employeeQuery = mysqli_query($con, "select * from employee");


$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-4">';
$out .=					'<h3 class = "hr-title">Employee</h3><br>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-3">';
$out .=					'<h3 class = "hr-title">Title</h3><br>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-3">';
$out .=					'<h3 class = "hr-title">Hours</h3><br>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-2">';
$out .=					'<h3 class = "hr-title">Salary</h3><br>';
$out .=				'</div>';

$out .=     	'</div>';

$out .=		'<div class = "hr-wrapper">';
					$c = 1;
				foreach ($employeeQuery as $key => $value) {
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-4">';
$out .=					'<span class = "hr-text">'. $c . '. ' .$value['name'].'</span><br><br>';
					$c++;
$out .=				'</div>';

$out .=		    	'<div class="col-md-3">';
$out .=					'<span class = "hr-text">'.$value['etype'].'</span><br><br>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-3">';
$out .=					'<span class = "hr-text">'.$value['hours'].' hours per week</span><br><br>';
$out .=				'</div>';
					$salary = number_format($value['salary']);
$out .=		    	'<div class="col-md-2">';
$out .=					'<span class = "hr-text">$'.$salary.' annually</span><br><br>';
$out .=				'</div>';

$out .=     	'</div>';
				}
$out .=		'</div>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<input type = "button" id = "add-employee-button" value = "Add New Employee" data-toggle="modal" data-target="#employee-modal"></input>';
$out .=				'</div>';
$out .=     	'</div>';

$out .=     '<div class="modal fade" id="employee-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
$out .=       '<div class="employee-panel" id="reg-panel">';
$out .=         '<form onsubmit="return (checkHours() && checkSalary())" class="employee-form" id="reg-form" action = "add_employee.php" method = "post">';
$out .=           '<h2 class="employee-header text-center">New Employee</h2>';
$out .=           		'<label class="credential-label">Name</label>';
$out .=           		'<input class="reg-credential" name="name" id="name" type="text" required>';
$out .=           		'<label class="credential-label">Title</label>';
$out .=           		'<input class="reg-credential" name="title" id="title" type="text" required>';
$out .=           		'<label class="credential-label">Hours</label>';
$out .=           		'<input class="reg-credential" name="hours" id="hours" type="text" required>';
$out .=           		'<label class="credential-label">Salary</label>';
$out .=           		'<input class="reg-credential" name="salary" id="salary" type="text" required>';
$out .=           '<input type="submit" id = "submit" class="checkout-submit" value="Submit" ">';
$out .=         '</form>';
$out .=       '</div>';
$out .=     '</div>';

$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>

<script>
function checkHours() {
	var str = document.getElementById('hours').value;
    if (isNaN(str)){
        alert("Hours must be a number.");
        return false;
    }
    else{
    return true;
	}
}

</script>

<script>
function checkSalary() {
	var str = document.getElementById('salary').value;
    if (isNaN(str)){
        alert("Salary must be a number.");
        return false;
    }
    else{
    return true;
	}
}

</script>