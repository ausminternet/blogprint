<?php snippet( 'header') ?>

<section id="post">

<article>
  <header>
    <h1>
      <a href="<?= getPostUrl($post) ?>">
        <?= $post->title()->html() ?>
      </a>
    </h1>
  </header>

  <?php snippet('post-footer', array('post'       => $post,
                                     'author'     => true,
                                     'avatar'     => true,
                                     'tags'       => true,
                                     'category' => true)) ?>

  <?= getCoverImage($post) ?>

  <?= $post->text()->kirbytext() ?>

</article>

<?= snippet('nav-pager') ?>

</section>

<?php snippet('footer') ?>
