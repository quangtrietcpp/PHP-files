<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <h2>User</h2>
  <div class="container">
    <form class="form-horizontal" role="form" name="user_form" action="add_user.php" method="post">
    <div class="form-group">
      <div class="row">
        <div class="col-md-2">Username</div>
        <div class="col-md-10">
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-2">Password</div>
        <div class="col-md-10">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-2">Email</div>
        <div class="col-md-10">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-2">Skills</div>
        <div class="form-check form-check-inline"> 
          <input type="checkbox" class="form-check-input" name="skill[]" value="Bsn">Business
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="checkbox-inline" name="skill[]" value="Math">Math
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="checkbox-inline" name="skill[]" value="IT" checked="checked">IT
        </div>
      </div><br /><br />
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