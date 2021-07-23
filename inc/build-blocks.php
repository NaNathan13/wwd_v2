<?php 

function build_blocks($blocks){
  if(empty($blocks)){
    return false;
  }

  foreach($blocks as $block){
    switch($block['acf_fc_layout']){
      case 'accordion':
        block('accordion', $block);
        break;
      case 'content':
        block('content', $block);
        break;
      case 'hero':
        block('hero', $block);
        break;
      case '':
        block('content-and-full-bleed-image', $block);
        break;
      case 'columns':
        block('column-content', $block);
        break;
      case 'accordion':
        block('accordion', $block);
        break;
      case 'hero':
        block('hero', $block);
        break;
      case 'stats':
        block('stats', $block);
        break;
    }
  }
}