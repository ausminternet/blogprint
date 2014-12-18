<section id="dates">
  <header>
    <h2>Dates:</h2>
  </header>
  <?php if($dates = getDatesArchive()): ?>
  <ul>
  <?php foreach ($dates as $year => $months): ?>
    <li>
      <a href="/<?= $year ?>">
        <?= $year ?>
      </a>
      <ul>
      <?php foreach ($months as $month => $number): ?>
        <li>
          <a href="<?= $site->url()
                       . '/' . $year
                       . '/' . date('m',strtotime($month)) ?>">
            <?= $month ?> (<?= $number ?>)
          </a>
        </li>
      <?php endforeach ?>
      </ul>
    </li>
  <?php endforeach ?>
  </ul>
  <?php else: ?>
    <p><strong>No dates found.</strong></p>
  <?php endif ?>
</section>
