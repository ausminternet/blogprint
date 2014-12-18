<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
    <meta name="description" content="<?= $site->description()->html() ?>">
    <meta name="keywords" content="<?= $site->keywords()->html() ?>">

  </head>
  <body>

  <header>
    <h1>
      <a href="<?= $site->url() ?>"><?= $site->title()->html() ?></a>
    </h1>

  <?php snippet('nav-main') ?>

  <?php snippet('search') ?>
  </header>

  <main>
