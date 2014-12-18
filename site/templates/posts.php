<?php snippet( 'header') ?>

<section id="posts">

<?php foreach($posts as $post): ?>
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
                                       'tags'       => true,
                                       'category'   => true)) ?>

    <?= getCoverImage($post) ?>

    <?= $post->text()->kirbytext() ?>

  </article>
<?php endforeach ?>

<?php snippet('nav-pagination') ?>

</section>

<?php snippet('archives', array('dates'      => true,
                                'authors'    => true,
                                'tags'       => true,
                                'categories' => true)) ?>

<?php snippet( 'footer') ?>
