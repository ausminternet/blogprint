<nav id="pager">
  <ul>

    <?php if($post->hasNextVisible()): ?>
      <li id="next-post">
        <a href="<?= $post->nextVisible()->url() ?>">
          next post:<?= $post->nextVisible()->title()->html() ?>
        </a>
      </li>
    <?php endif ?>

    <?php if($post->hasPrevVisible()): ?>
      <li class="previous-post">
        <a href="<?= $post->prevVisible()->url() ?>">
          previous post: <?= $post->prevVisible()->title()->html() ?>
        </a>
      </li>
    <?php endif ?>

  </ul>
</nav>
