<?php snippet('header') ?>

<header>
  <h1><?= $page->title()->html() ?></h1>
</header>

<?= $page->text()->kirbytext() ?>

<?php snippet('footer') ?>
