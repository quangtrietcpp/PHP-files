<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
  if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']))
    {
  ?>
    <script language=JavaScript> 
      alert("Not enough data!");
    </script>
  <?php
	exit();
	} else {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  $email = $_POST['email'];
	  $skill = implode(', ', $_POST['skill']);
	  $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
      mysqli_set_charset($link, 'UTF8');
      $sql = "select * from users";
	  $rslt = mysqli_query($link, $sql);
	  $totalUser = mysqli_num_rows($rslt);
	  $i = 0;
	  $n = $totalUser + 1;
	  while ($r = mysqli_fetch_array($rslt))
	  {
        $i+=1;
		if ($username === $r["username"])
		{
		  $n = $r["id"];
  ?>
          <script language=JavaScript> 
            alert("Username existed!");
          </script>  
  <?php
		  break;
		}
	  }
	  if ($n == $totalUser + 1)
	  {
		$sql = "INSERT INTO users VALUES (" . $n . ", '" . $username . "', '" . $password . "', '" . $email . "', '". $skill;
		$sql.= "', '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";
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
    }
    mysqli_close($link);
  ?>
  <a href="index.php">Back to the homepage</a>
<?php
  include 'footer.php';
?>