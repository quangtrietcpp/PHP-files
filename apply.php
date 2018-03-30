<?php
	include 'header.php';
	include 'nav_menu.php';
	require 'global_variables.php';
	require 'db_connection.php';
?>
<h2>Apply</h2>
<?php
	if ($_SERVER['REQUEST_METHOD']==="GET")
	{
		$job_id = $_GET['job_id'];
		$stSQL = "SELECT id FROM applications";
		$result = mysqli_query($link, $stSQL);
		$totalRows = mysqli_num_rows($result);
		$stSQL = "SELECT c.name FROM categories AS c, jobs AS j WHERE (c.`id`=j.`category_id`) AND (j.`id`=" . $job_id . ")";
		$result = mysqli_query($link, $stSQL);
		$row = mysqli_fetch_array($result);
		$occupation = $row["name"];
?>
<div class="container">
	<form class="form-horizontal" role="form" name="apply_form" action="apply.php" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-md-1">Username</div>
			<div class="col-md-11">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-1">Job ID</div>
			<div class="col-md-11">
				<input type="text" name="job_id" class="form-control" readonly value=<?=$job_id?>>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-1">Job Name</div>
			<div class="col-md-11">
				<input type="text" name="occupation" class="form-control" readonly value=<?=$occupation?>>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-1">Message</div>
			<div class="col-md-11">
				<textarea cols="100" rows="5" class="form-control" name="message" wrap="off"> </textarea>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<input type="submit" value="Send" class="btn btn-primary">
			</div>
		</div>
	</div>
	</form>
</div>
<?php
	} else {
		if (!isset($_POST['username']) || !isset($_POST['message']))
		{
			echo "<b style =\"color: red\"> Not enough data! </b>" . "<br/>";
			exit();
		} else {
			$job_id = $_POST['job_id'];
			$txt_username = $_POST['username'];
			$txt_message = $_POST['message'];
			$stSQL = "SELECT id FROM users WHERE username like '$txt_username'";
			$result = mysqli_query($link, $stSQL);
			$row = mysqli_fetch_array($result);
			$user_id = $row["id"];
			$datetime = date('Y-m-d H:i:s');
			$stSQL = "INSERT INTO applications (job_id, user_id, message, created, modified) VALUES ($job_id, $user_id, '$txt_message', '$datetime', '$datetime')";
			$result = mysqli_query($link, $stSQL);
			if ($result==0)
			{
				echo "<b style =\"color: red\"> Fail to apply! </b>" . "<br/>";
			} else {
				echo "<b style =\"color: blue\"> Apply successfully! </b>" . "<br/>";
			}
		}
	}
?>
<?php
	include 'footer.php';
?>