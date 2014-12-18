<?php snippet( 'header') ?>

<section id="blog">

<header>
  <h1>Archive<? e(isset($archiveTitle), $archiveTitle) ?>:</h1>
</header>

<?php if($posts->count()): ?>

<?php
$tmpDate = getdate(0);
foreach($posts as $post): ?>
  <?php if(!isset($year)): ?>
    <?php
      $date = getdate($post->date());
      if ($tmpDate['year'] != $date['year']): ?>
        <header class="archive-year">
          <h2>
            <?= $date['year'] ?>
          </h2>
        </header>
    <?php endif ?>
  <?php endif ?>

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
<?php
if(!isset($year)) $tmpDate = $date;
endforeach ?>


<?php else: ?>

  <?= $page->noposts()->kirbytext() ?>

<?php endif ?>

<?php snippet('nav-pagination') ?>

</section>

<?php snippet('archives', array('dates'      => true,
                                'authors'    => true,
                                'tags'       => true,
                                'categories' => true)) ?>

<?php snippet( 'footer') ?>
