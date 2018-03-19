<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
  if (!isset($_POST['occupation']))
    {
  ?>
    <script language=JavaScript> 
      alert("Not enough data!");
    </script>
  <?php
	exit();
	} else {
	  $job_id = $_POST['job_id'];
	  $occupation = $_POST['occupation'];
	  $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
      mysqli_set_charset($link, 'UTF8');
      $sql = "select id, name from categories";
	  $rslt = mysqli_query($link, $sql);
	  $totalCate = mysqli_num_rows($rslt);  
	  $i = 0;
	  $n = $totalCate + 1;
	  while ($r = mysqli_fetch_array($rslt))
	  {
        $i+=1;
		if ($occupation === $r["name"])
		{
		  $n = $r["id"];
		  break;
		}
	  }
	  if ($n == $totalCate + 1)
	  {
		$sql = "INSERT INTO categories VALUES (" . $n . ", " . $occupation;
		$sql.= ", '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";
		$rslt = mysqli_query($link, $sql);
	  }
	  $stSQL = "UPDATE jobs SET category_id=". $n . ", modified='" . date('Y-m-d H:i:s') . "' WHERE id=" . $job_id;
	  $result = mysqli_query($link, $stSQL);
      if ($result==0)
      {
  ?>
      <script language=JavaScript> 
        alert("Fail to edit!");
      </script>
  <?php
    } else {
  ?>
    <script language=JavaScript> 
      alert("Edit successfully!");
    </script>
  <?php
    }
	}
    mysqli_close($link);
  ?>
  <a href="index.php">Back to the homepage</a>
<?php
  include 'footer.php';
?>