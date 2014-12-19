<?php
if(!isset($dates))      $dates      = false;
if(!isset($authors))    $authors    = false;
if(!isset($tags))       $tags       = false;
if(!isset($categories)) $categories = false;
if(!isset($class))      $class    = false;
?>

<footer>

<section id="archives" <?php if($class) echo 'class="' . $class . '"' ?>>
  <header>
    <h1>Archive options:</h1>
  </header>

  <?php if($tags) snippet('archive-tags') ?>

  <?php if($categories) snippet('archive-categories') ?>

  <?php if($dates) snippet('archive-dates') ?>

  <?php if($authors) snippet('archive-authors') ?>

</section>
