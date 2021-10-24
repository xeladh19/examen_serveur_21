<?php

  /*
    ./app/views/categories/index.php
    Variables disponibles:
    - $categories ARRAY(ARRAY(id, name))
    - $nbrPost ARRAY(ARRAY(nbrPost, categorie_id))
  */

?>

<ul class="menu-link">
   <?php foreach ($categories as $categorie): ?>
      <li>
         <a href="index.html"><?php echo $categorie['name']; ?>

      <?php foreach ($nbrPosts as $nbrPost): ?>

         <?php if($nbrPost['category_id'] === $categorie['id']): ?>[<?php echo $nbrPost['nbrPostsByCategory']; ?>]
            <?php endif; ?>
                   
      <?php endforeach; ?>
         </a>

      </li>


   <?php endforeach; ?>
</ul>