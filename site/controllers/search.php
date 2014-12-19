<?php

return function($site, $pages, $page) {

  $query    = isset($_GET['q']) ? $_GET[ 'q'] : null;
  $location = isset($_GET['l']) ? $_GET[ 'l'] : null;
  $results    = null;

  if($query){

    switch ($location) {
      case 'site':
        $results = $site->search($query, array('words' => true))
                      ->visible();
        break;

      default:
        $results = $site->find('posts')
                      ->search($query, array('words' => true))
                      ->visible();
        break;
    }

    // add pagination
    $results = $results->paginate(c::get('pagination-search'));
    $pagination = $results->pagination();
  }


  //pass all variables to the template
  return compact('results', 'query');

};

?>
