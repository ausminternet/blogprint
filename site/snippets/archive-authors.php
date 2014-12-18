<section id="authors">
  <header>
    <h2>Authors:</h2>
  </header>
  <?php
  $authors = getAuthorsArchive();
  if($authors->count() > 0): ?>
    <ul>
    <?php foreach($authors as $author): ?>
      <li>
        <a href="<?php echo $author->url() ?>">
          <?= getAuthorName($author->name()) ?> (<?= $author->results() ?>)
        </a>
      </li>
    <?php endforeach ?>
    </ul>
  <?php else: ?>
    <p><strong>No authors found.</strong></p>
  <?php endif ?>
</section>
