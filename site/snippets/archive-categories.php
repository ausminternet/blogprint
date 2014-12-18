<section id="categories">
  <header>
    <h2>Categories:</h2>
  </header>
  <?php
  $categories = getCategoriesArchive();
  if($categories->count() > 0): ?>
    <ul>
    <?php foreach($categories as $category): ?>
      <li>
        <a href="<?php echo $category->url() ?>">
          <?php echo $category->name() ?> (<?= $category->results() ?>)
        </a>
      </li>
    <?php endforeach ?>
    </ul>
  <?php else: ?>
    <p><strong>No categories found.</strong></p>
  <?php endif ?>
</section>
