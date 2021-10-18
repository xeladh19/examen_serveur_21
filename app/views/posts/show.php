<?php
  /*
    ./app/views/posts/show.php
        Variables disponibles:
        - $post ARRAY(postId, title, text, postDate, quote, categorieId, categorieName))
  */
?>

          <!-- Blog Post (Right Sidebar) Start -->
          
         
            <div class="col-md-12 page-body">
              <div class="row">
              
                <div class="sub-title">
                  <a href="index.html" title="Go to Home Page"><h2>Back Home</h2></a>
                  <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
                </div>

                <div class="col-md-12 content-page">
                  <div class="col-md-12 blog-post">
                    <div>
                      <img src="images/blog/<?php echo $post['image']; ?>" alt="">
                    </div>

                    <!-- Post Headline Start -->
                    <div class="post-title">
                      <h1>
                        <?php echo $post['title']; ?>
                      </h1>
                    </div>
                    <!-- Post Headline End -->

                    <!-- Post Detail Start -->
                    <div class="post-info">
                      <span><?php echo \Core\Functions\datify($post['created_at']); ?></span> | <span>Life style</span>
                    </div>
                    <!-- Post Detail End -->

                    <p>
                    <?php echo \Core\Functions\truncate($post['text']); ?>
                    </p>

                    <!-- Post Blockquote (Italic Style) Start -->
                    <blockquote class="margin-top-40 margin-bottom-40">
                      <p>
                      <?php echo $post['quote'];?>
                      </p>
                    </blockquote>
                    <!-- Post Blockquote (Italic Style) End -->

                    <!-- Post Buttons -->
                    <div><a href="posts/<?php echo $post['id'] ?>/<?php echo \Core\Functions\slugify($post['title']); ?>/editform.html" type="button" class="btn btn-primary">Edit Post</a>
                      <a href="#"type="button"class="btn btn-secondary"role="button">Delete Post</a>
                    </div>
                    <!-- Post Buttons End -->
                  </div>
                </div>
           
              </div>
            </div>
          
 
          

          