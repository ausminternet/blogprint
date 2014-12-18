# blogprint - a blueprint for blogs with kirby

**blogprint** is a theme for the awesome [kirby](http://getkirby.com/) CMS, to kickstart a blog. It provides all basic features you need for a fully functional blog, but without any styling - only semantic markup is provided.

## Features:
- General
  - Pagination
  - Search (whole site or just the pages)
- Posts:
  - Title
  - Date
  - Tags
  - Categories
  - Covereimage
  - Author
  - Avatar
  - next/prev links
- Archive (each with count):
  - Years
  - Years and Month
  - Tags
  - Catgeories
  - Authors

If the archive is opened withput any arguments, it will list all articles seperated by year without the text.

There is also a main menu which will show all visible first-level-pages and their visible children (except children for 'posts' - which is not visible on default) to add additional pages to the blog.

## Configuration:

You can control some stuff in ```site/config/config.php```:

```c::set('pagination-posts', 10);```: number of posts per page


```c::set('pagination-archive', 30);```: number of posts per archive page


```c::set('pagination-search', 30);```: number of posts per search page


## Special snippets:

### post-footer.php

**Description:**

This snippet can list all metadata like date, author, tags and categories for a given post.

**Options:**

- post      => $post
- date      => true/false (default: true)
- author    => true/false (default: false)
- avatar    => true/false (default: false)
- tags      => true/false (default: false)
- category  => true/false (default: false)

**Usage:**

```
<?php snippet('post-footer', array('post'       => $post,
                                   'author'     => true,
                                   'avatar'     => true,
                                   'tags'       => true,
                                   'category'   => true)) ?>
```

### archives.php

**Description:**

This snippet can list archives for dates, authors, tags and categories for all posts.

**Options:**

- dates       => true/false (default: false)
- authors     => true/false (default: false)
- tags        => true/false (default: false)
- categories  => true/false (default: false)

**Usage:**

```
<?php snippet('archives', array('dates'      => true,
                                'authors'    => true,
                                'tags'       => true,
                                'categories' => true)) ?>
```

## helpful functions:

### getPostUrl( $post )

Returns the wordpress-style-uri for a given post.

### getAuthorName( $username )

Returns the first- and lastname for a given username.
If no firstname is available, then the username will be returned.
The lastname will only be used, if a firstname is available.

### getCoverImage( $post )

Returns the coverimage-img-tag for a given post, if a coverimage is available.
If no coverimage is available, it will return *false*.

## Routing:

All posts are located under ```/posts```, but this folder will be ommited in all urls.

### Post URLs:
All links are in Wordpress-style: ```/year/month/day/post-title``` (for example: ```http://blog.dev/2014/12/24/lorem-ipsum ```) and will be automaticaly routed to ```/posts/post-title``` internaly.

### Archive URLs:

Archive for:

- year: ```/$year/```
- month: ```/$year/$month/```
- day: ```/$year/$month/$day/```
- tags: ```/tag/$tag/```
- categories: ```/category/$category/```
- authors: ```/author/$author/```

## TODO:

- make translatable, when Bug https://github.com/getkirby/kirby/issues/156 is fixed
- add disqus
- make blogprint foundation-ready
- make blogprint bootstrap-ready
