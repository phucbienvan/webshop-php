<?php
include "../classes/adminlogin.php";	

$class = new adminlogin();
if(isset($_POST['login'])){ 
	$adminUser = $_POST['adminUser'];
	$adminPass = $_POST['adminPass'];

	$login_check = $class->login_admin($adminUser, $adminPass);
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<?php
			if(isset($login_check)){
				echo $login_check;
			}
			?>
			<div>
				<input type="text"  name="adminUser"/>
			</div>
			<div>
				<input type="text"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>