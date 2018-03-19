<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
  if (!isset($_GET['occupation']))
    {
  ?>
    <script language=JavaScript> 
      alert("Not enough data!");
    </script>
  <?php
	exit();
	} else {
	  $occupation = $_GET['occupation'];	
      $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
      mysqli_set_charset($link, 'UTF8');
      $stSQL = "SELECT j.id AS job_id, c.name AS occupation, j.modified AS posted FROM jobs AS j, categories AS c WHERE (j.`category_id`=c.`id`) AND (c.name='" . $occupation . "')";
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
	  }
	  mysqli_close($link);
	?>
  </table>
  </div>	
  <a href="index.php">Back to the homepage</a>
<?php
  include 'footer.php';
?>