<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
    if (!isset($_POST['username']) || !isset($_POST['message']))
    {
  ?>
    <script language=JavaScript> 
      alert("Not enough data!");
    </script>
  <?php
      exit();
    } else {
      $txt_username = $_POST['username'];
	  $txt_message = $_POST['message'];
    }
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
    $stSQL = "SELECT id FROM applications";
    $result = mysqli_query($link, $stSQL);
    $totalApps = mysqli_num_rows($result);
    $stSQL = "SELECT id FROM users WHERE username like '" . $txt_username . "'";
    $result = mysqli_query($link, $stSQL);
    $row = mysqli_fetch_array($result);
    $user_id = $row["id"];
    $stSQL = "INSERT INTO applications VALUES(". ($totalApps+1) . ", ";
    $stSQL.= $_POST["job_id"] . ", ";
    $stSQL.= $user_id . ", '" . $txt_message . "', ";
    $stSQL.= "'". date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";
    $result = mysqli_query($link, $stSQL);
    if ($result==0)
    {
  ?>
    <script language=JavaScript> 
      alert("Fail to apply!");
    </script>
  <?php
    } else {
  ?>
    <script language=JavaScript> 
      alert("Apply successfully!");
    </script>
  <?php
    }
    mysqli_close($link);
  ?>
  <a href="find_job.php">Back to the previous page</a>
<?php
  include 'footer.php';
?>