<?php

	session_start();
	if (isset($_SESSION['login'])) {
		header("Location:dashboard.php");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php

include("fun/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
$user = $_POST['user'];
$pass = $_POST['password'];

$select = "SELECT * FROM admins WHERE name = '$user' && password = '$pass'";
$result = $conn->query($select);
$num = $result->num_rows;
$row = $result->fetch_assoc(); 
// echo $num ;
if ($num > 0 && $row['pr'] == 1) {

	$_SESSION['login']= $user ;
	header("location:dashboard.php");
}

}


?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="<?=  $_SERVER['PHP_SELF']    ?>" method="POST">
<fieldset>
<div class="form-group">
	<input class="form-control" placeholder="Username" name="user" type="text" autofocus="">
</div>
<div class="form-group">
	<input class="form-control" placeholder="Password" name="password" type="password" >
</div>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if($num == 0){
		echo "<div class='alert alert-danger'> wrong data </div>";
	}elseif ($num > 0 && $row['pr'] == 2 ) {
		$name = $row['name'];
		echo "<div class='alert alert-warning'>welcome $name you are admin and not allow to enter this page </div>";
	}elseif ($num > 0 && $row['pr'] == 3 ) {
		$name = $row['name'];
		echo "<div class='alert alert-warning'>welcome $name you are supervisor and not allow to enter this page </div>";
	}



}



?>
<input type="submit" value="Login" class="btn btn-primary">

</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
