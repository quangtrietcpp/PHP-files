<?php 
	include 'header.php';
	include 'nav_menu.php';
	require 'global_variables.php';
	require 'db_connection.php';
?>
<?php
	if ($_SERVER['REQUEST_METHOD']==="GET")
	{
		$job_id = $_GET["job_id"];
?>
<div class="container">
	<form class="form-horizontal" role="form" name="edit_form" action="remove.php" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-md-1">Job ID</div>
			<div class="col-md-11">
				<input type="text" name="job_id" class="form-control" readonly value=<?=$job_id?>>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-12">Are you sure to remove this job?</div>
		</div><br />
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<input type="submit" value="Remove" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
<?php
	} else {
		$job_id = $_POST['job_id'];
		$stSQL = "DELETE FROM jobs WHERE id=$job_id";
		$result = mysqli_query($link, $stSQL);
		if ($result==0)
		{
			echo "<b style =\"color: red\"> Fail to remove! </b>" . "<br/>";
		} else {
			echo "<b style =\"color: blue\"> Remove successfully! </b>" . "<br/>";
		}
	}
?>
<?php
	include 'footer.php';
?>