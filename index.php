<?php 
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <h2>New jobs</h2>
  <br />
  <div class="container">
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