<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
<h2>Apply</h2>
  <div class="container">
    <form class="form-horizontal" role="form" name="apply_form" action="apply.html" method="post">
    <div class="form-group">
      <div class="row">
        <div class="col-md-1">Username</div>
        <div class="col-md-11">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-1">Job</div>
        <div class="col-md-11">
          <input type="text" name="occupation" class="form-control" placeholder="Occupation">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-1">Message</div>
        <div class="col-md-11">
          <textarea cols="100" rows="5" class="form-control" name="message" wrap="off"> </textarea>
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-2 col-md-offset-2">
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
    </div>
    </form>
  </div>
<?php
  include 'footer.php';
?>