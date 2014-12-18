<?php
if(!isset($date))     $date     = true;
if(!isset($author))   $author   = false;
if(!isset($avatar))   $avatar   = false;
if(!isset($tags))     $tags     = false;
if(!isset($category)) $category = false;
?>

<footer>

  <?php if($date): ?>
    <div class="datetime">
      <time datetime="<?= $post->date('Y-m-d') ?>">
        Date:
        <?= $post->date('Y/m/d') ?>
      </time>
    </div>
  <?php endif ?>

  <?php if($author && $post->author() != ""): ?>
    <div class="author">
      Author:
      <a href="<?= $site->url() ?>/author/<?= urlencode($post->author()) ?>">
        <?= getAuthorName((string)$post->author()) ?>
      </a>
    </div>
  <?php endif ?>

  <?php if($avatar && $post->author() != ""): ?>
    <?php if($avatar = $site->user((string)$post->author())->avatar()): ?>
      <div class="avatar">
        Avatar:
        <img src="<?= $avatar->url() ?>"
             alt="<?= getAuthorName((string)$post->author()) ?>'s avatar">
      </div>
    <?php endif ?>
  <?php endif ?>

  <?php if($tags && $post->tags() != ""): ?>
    <div class="tags">
      Tags:
      <ul>
        <?php foreach($post->tags()->split(',') as $tag): ?>
          <li>
            <a href="<?= $site->url() ?>/tag/<?= urlencode($tag) ?>">
              <?= $tag ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>

  <?php if($category &&  $post->category() != ""): ?>
    <div class="category">
      Category:
      <a href="<?= $site->url()
                 . '/category/'
                 . urlencode($post->category()) ?>">
        <?= $post->category()->html() ?>
      </a>
    </div>
  <?php endif ?>

</footer>
