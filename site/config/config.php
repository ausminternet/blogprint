<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Blogprint Configuration
---------------------------------------

*/

c::set('pagination-posts', 10);
c::set('pagination-archive', 30);
c::set('pagination-search', 30);

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('markdown.extra', true);

/* where's the blog? */
c::set('posts', 'posts');
c::set('debug', 'true');

c::set('routes', array(
  array(
    'pattern' => 'category/(:any)',
    'action'  => function($category) {

      $data = array('category' => $category);

      return array('archive', $data);
    }
  ),
  array(
    'pattern' => 'author/(:any)',
    'action'  => function($author) {

      $data = array('author' => $author);

      return array('archive', $data);
    }
  ),
  array(
    'pattern' => 'tag/(:any)',
    'action'  => function($tag) {

      $data = array('tag' => $tag);

      return array('archive', $data);

    }
  ),
  array(
    'pattern' => '(:num)/(:num)/(:num)/(:any)',
    'action'  => function($year, $month, $day, $uid) {

      $page = page(c::get('posts') . '/' . $uid);
      if(!$page){
        $page = site()->errorPage();
      } else {
        if(($page->date('Y') != $year)
            || ($page->date('m') != $month)
            || ($page->date('d') != $day)) {
          $page = site()->errorPage();
        }
      }
      return site()->visit($page);
    }
  ),
  array(
    'pattern' => '(:num)/(:num)/(:num)',
    'action'  => function($year, $month, $day) {

      if(($year > 0 && $year <= 9999)
          && ($month > 0 && $month <= 12)
          && ($day > 0 && $day <= 31)) {
          $data = array('year'  => $year,
                        'month' => $month,
                        'day'   => $day);
          return array('archive', $data);
      } else {
          go('error');
      }
    }
  ),
  array(
    'pattern' => '(:num)/(:num)',
    'action'  => function($year, $month) {

      if(($year > 0 && $year <= 9999)
          && ($month > 0 && $month <= 12)) {
          $data = array('year'  => $year,
                    'month' => $month);
          return array('archive', $data);
      } else {
          go('error');
      }
    }
  ),
  array(
    'pattern' => '(:num)',
    'action'  => function($year) {
      if($year > 0 && $year <= 9999) {
        $data = array('year'  => $year);
        return array('archive', $data);
      } else {
        go('error');
      }
    }
  )
));
