<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
  if (!isset($_POST['occupation']) || !isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['username']))
    {
  ?>
    <script language=JavaScript> 
      alert("Not enough data!");
    </script>
  <?php
	exit();
	} else {
	  $username = $_POST['username'];
	  $occupation = $_POST['occupation'];
	  $title = $_POST['title'];
	  $description = $_POST['description'];
	  if ($_POST['pop']== "private") $p = 0;
	  else $p = 1;
	  $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
      mysqli_set_charset($link, 'UTF8');
      $sql = "select * from jobs";
	  $rslt = mysqli_query($link, $sql);
	  $totalJob = mysqli_num_rows($rslt);
	  $i = 0;
	  $n = $totalJob + 1;
	  $sql = "SELECT id FROM users WHERE username = '" . $username . "'";
	  $rslt = mysqli_query($link, $sql);
	  $r = mysqli_fetch_array($rslt);
	  $creator = $r['id'];
	  $sql = "INSERT INTO jobs VALUES (" . $n . ", " . $occupation . ", " . $creator . ", '" . $title . "', '". $description . "', " . $p;
	  $sql.= ", '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";
	  $result = mysqli_query($link, $sql);
      if ($result==0)
      {
  ?>
      <script language=JavaScript> 
        alert("Fail to add!");
      </script>
  <?php
      } else {
  ?>
      <script language=JavaScript> 
        alert("Add successfully!");
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