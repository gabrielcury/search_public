<?php

/**
 * ownCloud - search_public
 *
 * @author Jorge Rafael García Ramos
 * @copyright 2013 Jorge Rafael García Ramos <kadukeitor@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

OCP\User::checkLoggedIn();
OCP\App::checkAppEnabled('search_public');

$l = OC_L10N::get('search_public');

if ( isset($_POST['pattern']) and $_POST['pattern'] != '' ) {

	$pattern =  OCP\UTIL::sanitizeHTML($_POST['pattern'])  ;

    $query    = OCP\DB::prepare('SELECT `name` , `token` , `uid_owner` , `size` , `stime`
    								FROM `*PREFIX*share` , `*PREFIX*filecache`  
    								WHERE `name` LIKE ?
    									AND `share_type` = 3 
    									AND `item_source` = `fileid`');
    $result   = $query->execute( array( '%' . $pattern . '%' ));
    $search   = $result->fetchAll() ;

    if ( count($search) > 0 ){
    	$caption = $l->t('Found ') . count($search) .  $l->t(' coincidence(s)');
    } else {
    	$caption = $l->t('No matches found for ') . '<em>' . $pattern . '</em>' ;
    }

	$tmpl = new OCP\Template('search_public', 'search' , 'user');
	$tmpl->assign( 'caption' , $caption );
	$tmpl->assign( 'pattern' , $pattern );
	$tmpl->assign( 'search' , $search  );
    $tmpl->printPage();

} else {
    header( 'Location: ' . OCP\Util::linkTo( 'search_public' , 'index.php' ) ) ;
}