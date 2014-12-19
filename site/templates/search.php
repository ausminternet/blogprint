<?php snippet( 'header') ?>

<section id="search">

<?php if($query): ?>
  <h1><?= $page->resultTitle() ?> "<?= $query ?>"</h1>

    <section id="searchresults">
    <?php if($results != "" ): ?>

      <?php foreach($results as $result): ?>
        <article>

              <?php if($result->template() == 'post'): ?>
                <header>
                  <h1>
                    Post:
                    <a href="<?= getPostUrl($result) ?>">
                      <?= $result->title()->html() ?>
                    </a>
                  </h1>
                </header>

                <?php snippet('post-footer', array('post' => $result)) ?>

              <?php else: ?>
                <header>
                  <h1>
                    Page:
                    <a href="<?= $result->url() ?>">
                      <?= $result->title()->html() ?>
                    </a>
                  </h1>
                </header>
              <?php endif ?>


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
