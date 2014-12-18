<?php if($pagination->hasPages()): ?>

<nav id="pagination">
  <ul>

    <?php if($pagination->hasPrevPage()): ?>
      <li id="pagination-first">
        <a href="<?php echo $pagination->firstPageURL() ?>">
          &laquo;
        </a>
      </li>

      <li id="pagination-prev">
        <a href="<?php echo $pagination->prevPageURL() ?>">
          &lsaquo;
        </a>
      </li>
    <?php else: ?>
      <li id="pagination-first" class="disabled">
        &laquo;
      </li>
      <li id="pagination-prev" class="disabled">
        &lsaquo;
      </li>
    <?php endif ?>

    <?php foreach($pagination->range(8) as $r): ?>
      <li <?php if($pagination->page() == $r) echo ' class="active"' ?>>
        <a href="<?php echo $pagination->pageURL($r) ?>">
          <?php echo $r ?>
        </a>
      </li>
    <?php endforeach ?>

    <?php if($pagination->hasNextPage()): ?>
      <li id="pagination-next">
        <a href="<?php echo $pagination->nextPageURL() ?>">
          &rsaquo;
        </a>
      </li>

      <li id="pagination-last">
        <a href="<?php echo $pagination->lastPageURL() ?>">
          &raquo;
        </a>
      </li>
    <?php else: ?>
      <li id="pagination-next" class="disabled">
        &rsaquo;
      </li>
      <li id="pagination-last" class="disabled">
        &raquo;
      </li>
    <?php endif ?>

  </ul>
</nav>

<?php endif ?>
