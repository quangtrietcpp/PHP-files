<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <h2>Find a job</h2>
  <div class="container">
  <form class="form-horizontal" role="form" name="find_form" action="find_job.html" method="get">
  <div class="form-group">
    <div class="row">
      <div class="col-md-12">
        <input type="text" name="username" class="form-control" placeholder="Occupation">
      </div>
    </div><br />
    <div class="row">
      <select name="occupation">
        <?php foreach ($categories as $obj) : ?>
        <option value="<?=$obj?>"><?=$obj?></option>
        <?php endforeach ?>
      </select>
    </div><br />
    <div class="row">
    <div class="col-md-2 col-md-offset-2">
    <input type="submit" value="Search" class="btn btn-primary"></div>
    </div>
  </div>
  </form>
  <table class="table">
    <tr class="row"> 
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Posted</th>
        <th class="col-md-2">Action</th> 
    </tr>
    <?php foreach ($newJobs as $obj) : ?>
    <tr class="row"> 
      <td class="col-md-2"><?=$obj[0] ?></td>
      <td class="col-md-2"><?=$obj[2] ?></td>
      <td class="col-md-2">Apply</td> 
    </tr>
    <?php endforeach ?> 
  </table>
  </div>
<?php
  include 'footer.php';
?>