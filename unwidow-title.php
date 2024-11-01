<?php
/**
 * Plugin Name: Unwidow Title
 * Plugin URI: https://www.wordpress.org/plugins/unwidow-title/
 * Description: Replaces the last space in the title with a non-breaking space.
 * Version: 1.0
 * Author: Nathan Johnson
 * Author URI: https://atmoz.org/
 * Licence: GPLv2 or later
 * Licence URI: https://www.gnu.org/licences/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: unwidow-title
 */

namespace NathanAtmoz\UnwidowTitle;

//* Don't access this file directly
defined( 'ABSPATH' ) or die;

if( ! is_admin() )
  add_filter( 'the_title', 'NathanAtmoz\UnwidowTitle\unwidow_the_title' );

function unwidow_the_title( $title ) {
  return ( in_the_loop() && is_main_query() ) ? str_replace_last( ' ', '&nbsp;', $title ) : $title;
}

/**
 * Replace the last occurence of the search string with the replacement string.
 */
function str_replace_last( $search, $replace, $subject ) {
  return ( false === $position = strrpos( $subject, $search ) ) ? $subject : substr_replace( $subject, $replace, $position, strlen( $search ) );
}
