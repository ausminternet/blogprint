<?php
if(!isset($dates))      $dates      = false;
if(!isset($authors))    $authors    = false;
if(!isset($tags))       $tags       = false;
if(!isset($categories)) $categories = false;
?>

<section id="archives">
  <header>
    <h1>Archive options:</h1>
  </header>

  <?php if($tags) snippet('archive-tags') ?>

  <?php if($categories) snippet('archive-categories') ?>

  <?php if($dates) snippet('archive-dates') ?>

  <?php if($authors) snippet('archive-authors') ?>

</section>
