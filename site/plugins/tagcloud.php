<?php

/**
 * Tagcloud plugin
 *
 * @author Bastian Allgeier <bastian@getkirby.com>
 * @version 2.0.0
 *
 * Modified by Jan Hofmann <jan.hofmann@dexite.de>:
 * make $ds always '/'
 */
function tagcloud($parent, $options = array()) {

  // default values
  $defaults = array(
    'limit'    => false,
    'field'    => 'tags',
    'children' => 'visible',
    'baseurl'  => $parent->url(),
    'param'    => 'tag',
    'sort'     => 'results',
    'sortdir'  => 'desc'
  );

  // merge defaults and options
  $options = array_merge($defaults, $options);

  switch($options['children']) {
    case 'invisible':
      $children = $parent->children()->invisible();
      break;
    case 'visible':
      $children = $parent->children()->visible();
      break;
    default:
      $children = $parent->children();
      break;
  }

  $tags  = $children->pluck($options['field'], ',');
  $tags  = array_count_values($tags);
  $cloud = array();
  //$ds    = DS == '/' ? ':' : ';';
  $ds = '/';

  foreach($tags as $tag => $count) {

    $cloud[$tag] = new Obj(array(
      'results'  => $count,
      'name'     => $tag,
      'url'      => $options['baseurl'] . '/' . $options['param'] . $ds . urlencode($tag),
      'isActive' => urldecode(param($options['param'])) == $tag
    ));

  }

  $cloud = new Collection($cloud);
  $cloud = $cloud->sortBy($options['sort'], $options['sortdir']);

  if($options['limit']) {
    $cloud = $cloud->limit($options['limit']);
  }

  return $cloud;

}

?>
