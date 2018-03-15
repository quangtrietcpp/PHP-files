<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
    $job_id = $_GET["job_id"];
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
	/*$stSQL = "SELECT name FROM categories";
	$result = mysqli_fetch_array($link, $stSQL);*/
    $stSQL = "SELECT j.id AS job_id, c.name AS occupation FROM jobs AS j, categories AS c WHERE (j.`category_id`=c.`id`) AND (j.id=" . $job_id . ")";
    $result = mysqli_query($link, $stSQL);
    $row = mysqli_fetch_array($result);
  ?>
  <div class="container">
    <form class="form-horizontal" role="form" name="edit_form" action="insert.php" method="post">
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
    <input type="submit" value="Edit" class="btn btn-primary"></div>
    </div>
  </div>
  </form>
<?php
  include 'footer.php';
?>