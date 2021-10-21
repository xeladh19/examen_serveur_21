<?php

  /*
    ./app/vues/categories/index.php
    Variables disponibles:
    - $categories ARRAY(ARRAY(id, name, created_at))
    - $nbrPostsByCategorie ARRAY(ARRAY(nbrPostsByCategorie, categorie_id))
  */

?>

<ul class="menu-link">
   <?php foreach ($categories as $category): ?>
      <li><a href="index.html"><?php echo $category['name']; ?>
      <?php foreach ($nbrPosts as $nbrPost): ?>
         <?php if($nbrPost['category_id'] === $category['id']): ?>[<?php echo $nbrPost['nbrPostsByCategory']; ?>]</a></li>
         <?php endif; ?>
      <?php endforeach; ?>
   <?php endforeach; ?>
</ul>