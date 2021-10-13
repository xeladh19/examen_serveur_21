<?php
  /*
    ./app/views/template/partials/_main.php
  */
?>

    <div id="main">
      <div class="container">
        <div class="row">
          <!-- About Me (Left Sidebar) Start -->
        <?php include '../app/views/template/partials/_leftSideBar.php'; ?>
          <!-- About Me (Left Sidebar) End -->

          <!-- Blog Post (Right Sidebar) Start -->
          <?php include '../app/views/template/partials/_rightSideBar.php'; ?>
          <!-- Blog Post (Right Sidebar) End -->
        </div>
      </div>
    </div>