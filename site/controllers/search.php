<?php

return function($site, $pages, $page) {

  $query    = isset($_GET['q']) ? $_GET[ 'q'] : null;
  $location = isset($_GET['l']) ? $_GET[ 'l'] : null;
  $posts    = null;

  if($query){

    switch ($location) {
      case 'site':
        $posts = $site->search($query, array('words' => true))
                      ->visible();
        break;

      default:
        $posts = $site->find('posts')
                      ->search($query, array('words' => true))
                      ->visible();
        break;
    }

    // add pagination
    $posts = $posts->paginate(c::get('pagination-search'));
    $pagination = $posts->pagination();
  }


  //pass all variables to the template
  return compact('posts', 'query');

};

?>
