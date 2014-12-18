<?php snippet( 'header') ?>

<section id="search">

<?php if($query): ?>
  <h1><?= $page->resultTitle() ?> "<?= $query ?>"</h1>

    <section id="searchresults">
    <?php if($posts != "" ): ?>

      <?php foreach($posts as $post): ?>
        <article>
          <header>
            <h1>
              <a href="<?= getPostUrl($post) ?>">
                <?= $post->title()->html() ?>
              </a>
            </h1>
          </header>

          <?php snippet('post-footer', array('post' => $post)) ?>
        </article>

      <?php endforeach ?>

  <?php else: ?>
    <?= $page->noposts()->kirbytext() ?>
  <?php endif ?>
  </section>
<?php else: ?>
 <h1><?= $page->title() ?></h1>
 <?= $page->nosearch()->kirbytext() ?>
<?php endif ?>

</section>

<?php snippet( 'footer') ?>
