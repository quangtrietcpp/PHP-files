<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <h2>Apply</h2>
  <?php
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
	$job_id = $_GET["job_id"];
	$_POST["job_id"] = $job_id;
    $stSQL = "SELECT id FROM applications";
    $result = mysqli_query($link, $stSQL);
    $totalRows = mysqli_num_rows($result);
	$stSQL = "SELECT c.name FROM categories AS c, jobs AS j WHERE (c.`id`=j.`category_id`) AND (j.`id`=" . $job_id . ")";
	$result = mysqli_query($link, $stSQL);
    $row = mysqli_fetch_array($result);
	$occupation = $row["name"];
  ?>
  <div class="container">
    <form class="form-horizontal" role="form" name="apply_form" action="do_apply.php" method="post">
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
  include 'footer.php';
?>