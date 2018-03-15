<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <script language="javascript">
    var t = confirm("Are you sure to remove this job?");
    if (!t) 
    {
	  window.history.back(-1);
	  alert("Remove cancelled");
    }
  </script>
  <?php
    $job_id = $_GET["job_id"];
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
    $stSQL = "DELETE FROM jobs where id=" . $job_id;
    $result = mysqli_query($link, $stSQL);
    if ($result==0)
    {
  ?>
      <script language=JavaScript> 
        if (t) alert("Fail to remove!");
      </script>
  <?php
    } else {
  ?>
    <script language=JavaScript> 
      if (t) alert("Remove successfully!");
    </script>
  <?php
    }
    mysqli_close($link);
  ?>
  <a href="index.php">Back to the homepage</a>
<?php
  include 'footer.php';
?>