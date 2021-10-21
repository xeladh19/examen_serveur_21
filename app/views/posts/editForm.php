<?php
  /*
    ./app/views/posts/editForm.php
        Variables disponibles:
        - $post ARRAY(postId, title, text, postDate, quote, categorieId, categorieName))
  */
?>

            <div class="col-md-12 page-body">
              <div class="row">
                <div class="sub-title">
                  <a href="index.html" title="Go to Home Page"
                    ><h2>Back Home</h2></a
                  >
                  <a href="#comment" class="smoth-scroll"
                    ><i class="icon-bubbles"></i
                  ></a>
                </div>

                <div class="col-md-12 content-page">
                  <div class="col-md-12 blog-post">
                    <!-- Post Headline Start -->
                    <div class="post-title">
                      <h1>Post Form</h1>
                    </div>
                    <!-- Post Headline End -->

                    <!-- Form Start -->
                    <form action="posts/<?php echo $post['postId']; ?>/<?php echo \Core\Functions\slugify($post['title']); ?>/edit/update.html" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title"id="title"class="form-control"
                          placeholder="Enter your title here" value= "<?php echo $post['title']; ?>"/>
                    </div>
                      <div class="form-group">
                        <label for="text">Text</label>
                        <textarea id="text" name="text" class="form-control" rows="5"
                          placeholder="Enter your text here"><?php echo $post['text']; ?></textarea>
                      </div>
                      
                      <!-- Image upload -->
                      <div class="form-group">
                        <form action="index.php" method = "POST">
                        <label for="exampleFormControlFile1"> Image</label>
                        <input type="file" class="form-control-file btn btn-primary" id="exampleFormControlFile1" enctype= multipart/form-data >
                        </form>
                      </div>

                      <div class="form-group">
                        <label for="text">Quote</label>
                        <textarea
                          id="quote"
                          name="quote"
                          class="form-control"
                          rows="5"
                          placeholder="Enter your quote here"
                        ><?php echo $post['quote']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="text">Category</label>
                        <select id="category" name="category_id" class="form-control">
                          <option disabled selected>
                            Select your category
                          </option>
                          <!-- Mise en place des catégories pour un post -->
                          <?php include_once "../app/models/categoriesModel.php";
                                    $categories = App\Models\CategoriesModel\findAll($conn); ?>
                          <?php foreach ($categories as $categorie): ?>
                  <option value="<?php echo $categorie['id']; ?>" <?php if($categorie['id'] == $post['categorieId']) {echo 'selected="selected"';}?>><?php echo $categorie['name']; ?></option>
               <?php endforeach; ?>

                    </select>
                      </div>
                      <div>
                        <input
                          class="btn btn-primary"
                          type="submit"
                          value="submit"
                        />
                        <input
                          class="btn btn-secondary"
                          type="reset"
                          value="reset"
                        />
                      </div>
                    </form>
                    <!-- Form End -->
                  </div>
                </div>
              </div>
            </div>