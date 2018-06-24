<?php

return function($site, $pages, $page, $data) {

  // get all posts
  $posts = $site->find(c::get('posts'))->children()
                               ->visible()
                               ->flip();

  $archiveTitle = null;

  // filter by author
  if(isset($data['author'])) {
    $author = urldecode($data['author']);
    $posts = $posts->filterBy('author', $author);
    $archiveTitle = ' for author "'
                  . getAuthorName($author)
                  . ' (' . $author . ')"';
  }

  // filter by tag
  if(isset($data['tag'])) {
    $tag = urldecode($data['tag']);
    $posts = $posts->filterBy('tags', $tag, ',');
    $archiveTitle = ' for tag "' . $tag . '"';
  }

  // filter by category
  if(isset($data['category'])) {
    $category = urldecode($data['category']);
    $posts = $posts->filterBy('category', $category);
    $archiveTitle = ' for category "' . $category . '"';
  }

  // filter by year
  if(isset($data['year'])) {
    $year = $data['year'];
    $postsYear = new Pages;
    foreach ($posts as $a) {
      if($a->date('Y') == $year) $postsYear->add($a);
    }
    $archiveTitle = ' for ' . $year;
    $posts = $postsYear;

    // filter by month
    if(isset($data['month'])) {
      $month = $data['month'];
      $postsMonth = new Pages;
      foreach ($postsYear as $a) {
        if($a->date('m') == $month) $postsMonth->add($a);
      }

      // get month-name from number
      $dateObj   = DateTime::createFromFormat('!m', $month);
      $monthName = $dateObj->format('F'); // March

      $archiveTitle = ' for ' . $monthName . ' ' . $year;
      $posts = $postsMonth;

      // filter by day
      if(isset($data['day'])) {
        $day = $data['day'];
        $postsDay = new Pages;
        foreach ($postsMonth as $a) {
          if($a->date('d') == $day) $postsDay->add($a);
        }
        $archiveTitle = ' for ' . $day . '. ' . $monthName . ' ' . $year;
        $posts = $postsDay;
      }
    }
  }

  // add pagination
  $posts = $posts->paginate(c::get('pagination-archive'));
  $pagination = $posts->pagination();

  //pass all variables to the template
  return compact('posts', 'archiveTitle', 'data', 'pagination', 'year');

};

?>
