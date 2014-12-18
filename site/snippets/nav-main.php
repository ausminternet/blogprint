<nav id="main">
  <ul>

    <?php foreach($pages->visible() as $page): ?>
      <li <?php e($page->isOpen(),' class="active"') ?>>
        <a href="<?= $page->url() ?>">
          <?= $page->title()->html() ?>
        </a>
        <?php if($page->hasVisibleChildren() && $page->uid() != 'posts'): ?>
          <ul>
            <?php foreach($page->children()->visible() as $child): ?>
              <li <?php e($child->isActive(),' class="active"') ?>>
                <a href="<?= $child->url() ?>">
                  <?= $child->title()->html() ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </li>
    <?php endforeach ?>

  </ul>
</nav>
