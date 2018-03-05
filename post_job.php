<?php
  include 'header.php';
  include 'nav_menu.php';
  require 'global_variables.php';
?>
  <h2>Post a job</h2>
  <div class="container">
    <form class="form-horizontal" role="form" name="post_form" action="post_job.html" method="get">
    <div class="form-group">
      <div class="row">
        <div class="col-md-2">Category...</div>
        <div class="col-md-10"></div>
      </div><br />
      <div class="row">
        <select name="occupation">
          <?php foreach ($categories as $obj) : ?>
          <option value="<?=$obj?>"><?=$obj?></option>
          <?php endforeach ?>
        </select>
      </div><br />
      <div class="row">
        <div class="col-md-2">Title</div>
        <div class="col-md-10">
          <input type="text" name="username" class="form-control" placeholder="Title">
        </div>
      </div><br />
      <div class="row">
        <div class="col-md-2">Description</div>
        <div class="col-md-10">
          <textarea cols="100" rows="5" class="form-control" name="message" wrap="off"> </textarea>
        </div>
      </div><br />
      <div class="form-check form-check-inline"> 
        <input type="radio" name="pop" class="form-check-input" value="pub">public
      </div>
      <div class="form-check form-check-inline"> 
        <input type="radio" class="form-check-input" name="pop" value="pri" checked="checked">private
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