<?php
  /*
    ./app/views/posts/index.php
        Variables disponibles:
        - $posts ARRAY(ARRAY(title,text,created_at,quote))
  */







?>

<div class="col-md-12 page-body">
  <div class="row">
    <div class="col-md-12 content-page">
       <!-- ADD A POST -->
         <div>
            <a href="posts/add/form.html" type="button" class="btn btn-primary">Add a Post</a>
          </div>
        <!-- ADD A POST END -->

        <!-- Blog Post Start -->
          <div class="col-md-12 blog-post row">
            <?php foreach($posts as $post): ?>
              <div>
                <div class="post-title">
                  <a href="posts/<?php echo $post['postId']; ?>/<?php echo \Core\Functions\slugify($post['title']); ?>.html"><h1><?php echo $post['title']; ?></h1></a>
                </div>
                <div class="post-info">
                  <span><?php echo \Core\Functions\datify($post['postDate']); ?></span> | <span><?php echo $post['categorieName'];?></span>
                </div>
                  <p><?php echo \Core\Functions\truncate($post['text']); ?></p>
                          
                  <a href="posts/<?php echo $post['postId']; ?>/<?php echo \Core\Functions\slugify($post['title']); ?>.html" class="fa fa-long-arrow-right"><span>Read More</span></a>
                  </div>
                  <?php endforeach; ?>
          </div>

          
        <!-- Blog Post End -->
        <nav aria-label="Page navigation example" style="text-align: center;">
        <ul class="pagination">
          <?php  include_once "../app/views/template/partials/_pagination.php";?>
        </ul>
      </nav>
    </div>
  </div>
</div>