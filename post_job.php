<?php
	include 'header.php';
	include 'nav_menu.php';
	require 'global_variables.php';
	require 'db_connection.php';
?>
<?php
	if ($_SERVER['REQUEST_METHOD']==="GET")
	{
		$stSQL = "SELECT id, name FROM categories";
		$result = mysqli_query($link, $stSQL);
		$totalRows = mysqli_num_rows($result);
		$i=0;
		if ($totalRows==0) echo "<b style =\"color: red\"> There is no data! </b>" . "<br/>";
		else
?>
<h2>Post a job</h2>
<div class="container">
	<form class="form-horizontal" role="form" name="post_form" action="post_job.php" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-md-2">Category...</div>
			<div class="col-md-10"></div>
		</div><br />
		<div class="row">
			<select name="occupation">
				<?php 
					while ($row = mysqli_fetch_array($result))
					{
						$i+=1;		
				?>
				<option value="<?=$row["id"]?>"><?=$row["name"]?></option>
				<?php
					}
				?>
			</select>
		</div><br />
		<div class="row">
			<div class="col-md-2">Username</div>
			<div class="col-md-10">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2">Title</div>
			<div class="col-md-10">
				<input type="text" name="title" class="form-control" placeholder="Title">
			</div>
		</div><br />
		<div class="row">
			<div class="col-md-2">Description</div>
			<div class="col-md-10">
				<textarea cols="100" rows="5" class="form-control" name="description" wrap="off"> </textarea>
			</div>
		</div><br />
		<div class="form-check form-check-inline"> 
			<input type="radio" name="pop" class="form-check-input" value="public" checked="checked">public
		</div>
		<div class="form-check form-check-inline"> 
			<input type="radio" class="form-check-input" name="pop" value="private">private
		</div><br /><br />
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<input type="submit" value="Post" class="btn btn-primary">
			</div>
		</div>
	</div>
	</form>
</div>
<?php
	} else {
		if (!isset($_POST['occupation']) || !isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['username']))
		{
			echo "<b style =\"color: red\"> Not enough data! </b>" . "<br/>";	
			exit();
		} else {
			$username = $_POST['username'];
			$category_id = $_POST['occupation'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$is_public = $_POST['pop'] === "private" ? 0 : 1;
			$stSQL = "select * from jobs";
			$result = mysqli_query($link, $stSQL);
			$totalJob = mysqli_num_rows($result);
			$i = 0;
			$n = $totalJob + 1;
			$stSQL = "SELECT id FROM users WHERE username = '" . $username . "'";
			$result = mysqli_query($link, $stSQL);
			$r = mysqli_fetch_array($result);
			$creator = $r['id'];
			$datetime = date('Y-m-d H:i:s');
			$stSQL = "INSERT INTO jobs (category_id, creator, title, description, is_public, created, modified) VALUES ($category_id, $creator, '$title', '$description', $is_public, '$datetime', '$datetime')";
			$result = mysqli_query($link, $stSQL);
			if ($result==0)
			{
				echo "<b style =\"color: red\"> Fail to add! </b>" . "<br/>";	
			} else {
				echo "<b style =\"color: blue\"> Add successfully! </b>" . "<br/>";
			}
		}
	}
?>
<?php
	include 'footer.php';
?>