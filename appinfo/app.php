<?php

$l = OC_L10N::get('search_public');

OCP\Util::addStyle ('search_public','style');

OCP\App::addNavigationEntry(
    array( 'id' => 'search_public_index',
           'order' => 1,
           'href' => OCP\Util::linkTo( 'search_public' , 'index.php' ),
           'icon' => OCP\Util::imagePath( 'search_public', 'icon.png' ),
           'name' => $l->t('Search')  )
   );
