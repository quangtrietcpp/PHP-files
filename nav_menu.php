<?php require 'global_variables.php';?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= $home ?>"><?= $title ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php foreach ($links as $text => $href) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= $href ?>"><?= $text ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </nav>
