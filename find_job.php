<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
    $stSQL = "SELECT name FROM categories";
    $result = mysqli_query($link, $stSQL);
    $totalRows = mysqli_num_rows($result);
    $i=0;
    if ($totalRows==0) echo('There is no data!');
    else
  ?>
  <h2>Find a job</h2>
  <div class="container">
  <form class="form-horizontal" role="form" name="find_form" action="search.php" method="get">
  <div class="form-group">
    <div class="row">
      <select name="occupation">
        <?php while ($row = mysqli_fetch_array($result))
          {
			$i+=1;		
		?>
        <option value="<?=$row["name"]?>"><?=$row["name"]?></option>
        <?php
		  }
		?>
      </select>
    </div><br />
    <div class="row">
    <div class="col-md-2 col-md-offset-2">
    <input type="submit" value="Search" class="btn btn-primary"></div>
    </div>
  </div>
  </form>
  <?php
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
    $stSQL = "SELECT j.id AS job_id, c.name AS occupation, j.modified AS posted FROM jobs AS j, categories AS c WHERE (j.`category_id`=c.`id`)";
    $result = mysqli_query($link, $stSQL);
    $totalRows = mysqli_num_rows($result);
	$i=0;
	if ($totalRows==0) echo('There is no data!');
	else
  ?>
  <div class="container">
    <table class="table">
      <tr class="row">
        <th class="col-md-2">ID</th> 
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Posted</th>
        <th class="col-md-2">Action</th> 
      </tr>
    <?php
      while ($row = mysqli_fetch_array($result))
	  {
        $i+=1;
	?>
      <tr class="row">
        <td class="col-md-2"><?=$row["job_id"]?></td> 
        <td class="col-md-2"><?=$row["occupation"]?></td>
        <td class="col-md-2"><?=$row["posted"]?></td>
        <td class="col-md-2">
          <a href="<?= 'apply.php?job_id=' . $row["job_id"] ?>">Apply</a>
        </td> 
      </tr>
    <?php
	  }
	  mysqli_close($link);
	?>  
  </table>
  </div>
<?php
  include 'footer.php';
?>