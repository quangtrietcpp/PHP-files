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
		$stSQL = "SELECT j.`id` AS job_id, c.`name` AS occupation FROM jobs AS j, categories AS c WHERE (j.`category_id`=c.`id`) AND (j.`id`= $job_id)";
		$result = mysqli_query($link, $stSQL);
		$row = mysqli_fetch_array($result);
?>
<div class="container">
	<form class="form-horizontal" role="form" name="edit_form" action="edit.php" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-md-1">Job ID</div>
			<div class="col-md-11">
				<input type="text" name="job_id" class="form-control" readonly value=<?=$job_id?>>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-1">Job Name</div>
			<div class="col-md-11">
				<input type="text" name="occupation" class="form-control" value=<?=$row["occupation"]?>>
			</div>
		</div><br />
	<div class="row">
		<div class="col-md-2 col-md-offset-2">
			<input type="submit" value="Edit" class="btn btn-primary">
		</div>
	</div>
	</form>
</div>
<?php
	} else {
		if (!isset($_POST['occupation']))
		{
			echo "<b style =\"color: red\"> Not enough data! </b>" . "<br/>";
			exit();
		} else {
			$datetime = date('Y-m-d H:i:s');
			$job_id = $_POST['job_id'];
			$occupation = $_POST['occupation'];
			$stSQL = "SELECT id, name FROM categories";
			$result = mysqli_query($link, $stSQL);
			$totalCate = mysqli_num_rows($result);
			$category_id = $totalCate + 1;
			$i = 0;
			while ($r = mysqli_fetch_array($result))
			{
				$i += 1;
				if ($occupation === $r["name"])
				{
					$category_id = $r["id"];
					break;
				}
			}
			if ($category_id == $totalCate + 1)
			{
				$stSQL = "INSERT INTO categories (name, created, modified) VALUES ('$occupation', '$datetime', '$datetime')";
				$result = mysqli_query($link, $stSQL);
			}
			$stSQL = "UPDATE jobs SET category_id=$category_id, modified='$datetime' WHERE id=$job_id";
			$result = mysqli_query($link, $stSQL);
			if ($result==0)
			{
				echo "<b style =\"color: red\"> Fail to edit! </b>" . "<br/>";
			} else {
				echo "<b style =\"color: blue\"> Edit successfully! </b>" . "<br/>";
			}
		}
	}
?>
<?php
	include 'footer.php';
?>