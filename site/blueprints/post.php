<?php if(!defined('KIRBY')) exit ?>

title: Post
pages:false
files:
  sortable:true
fields:
  title:
    label: Title
    type:  text
  date:
    label: Datum
    type: date
    default: today
    width: 1/2
  author:
    label: Author
    type: user
    width: 1/2
  coverimage:
    label: Coverimage
    type: select
    options: images
    width: 1/2
  category:
    label: Category
    type: select
    width: 1/2
    options:
      general: general
      stuff: stuff
  tags:
    label: Tags
    type: tags
    lowercase: true
  text:
    label: Text
    type: textarea
    requiered: true


