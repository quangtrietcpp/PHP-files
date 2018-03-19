<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <?php
    $link = mysqli_connect('localhost', 'root', '', 'jobeet') or die('Cannot connect to the database.');
    mysqli_set_charset($link, 'UTF8');
    $stSQL = "SELECT id, name FROM categories";
    $result = mysqli_query($link, $stSQL);
    $totalRows = mysqli_num_rows($result);
    $i=0;
    if ($totalRows==0) echo('There is no data!');
    else
  ?>
  <h2>Post a job</h2>
  <div class="container">
    <form class="form-horizontal" role="form" name="post_form" action="add_job.php" method="post">
    <div class="form-group">
      <div class="row">
        <div class="col-md-2">Category...</div>
        <div class="col-md-10"></div>
      </div><br />
      <div class="row">
        <select name="occupation">
          <?php while ($row = mysqli_fetch_array($result))
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
  include 'footer.php';
?>