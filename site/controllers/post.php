<?php

return function($site, $pages, $page) {

  // rename page to post to be consistent
  $post = $page;

  // pass all variables to the template
  return compact('post');

};

?>
