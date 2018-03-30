<?php
	include 'header.php';
	include 'nav_menu.php';
	require 'global_variables.php';
	require 'db_connection.php';
?>
<h2>User</h2>
<?php
	if ($_SERVER['REQUEST_METHOD']==="GET")
	{
?>
<div class="container">
	<form class="form-horizontal" role="form" name="user_form" action="user.php" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-md-2">Username</div>
			<div class="col-md-10">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2">Password</div>
			<div class="col-md-10">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2">Email</div>
			<div class="col-md-10">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2">Skills</div>
			<div class="form-check form-check-inline"> 
				<input type="checkbox" class="form-check-input" name="skill[]" value="Bsn">Business
			</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" class="checkbox-inline" name="skill[]" value="Math">Math
			</div>
			<div class="form-check form-check-inline">
				<input type="checkbox" class="checkbox-inline" name="skill[]" value="IT" checked="checked">IT
			</div>
		</div><br /><br />
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
			<input type="submit" value="Save" class="btn btn-primary">
			</div>
		</div>
	</div>
	</form>
</div>
<?php
	} else {
		var_dump($_POST);
		if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']))
		{
			echo "<b style =\"color: red\"> Not enough data! </b>" . "<br/>";
			exit();
		} else {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$skill = implode(', ', $_POST['skill']);
			$stSQL = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($link, $stSQL);
			$totalUser = mysqli_num_rows($result);
			$datetime = date('Y-m-d H:i:s');
			if ($totalUser > 0)
			{
				echo "<b style =\"color: red\"> Username existed! </b>" . "<br/>";
			} else {
				$stSQL = "INSERT INTO users (username, password, email, skills, created, modified) VALUES ('$username', '$password', '$email', '$skill', '$datetime', 
					'$datetime')";
				$result = mysqli_query($link, $stSQL);
				if ($result==0)
				{
					echo "<b style =\"color: red\"> Fail to add! </b>" . "<br/>";
				} else {
					echo "<b style =\"color: blue\"> Add successfully! </b>" . "<br/>";
				}
			}
		}
	}
?>
<?php
	include 'footer.php';
?>