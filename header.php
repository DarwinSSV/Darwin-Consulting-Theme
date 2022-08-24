<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package darwinconsulting
 */

 if( function_exists( 'myprefix_get_theme_option' ) ) {

  $header = myprefix_get_theme_option( 'header-style' );
  if( $header ) {
  
    if( $header == '2' ) {
  
     get_template_part( 'header', 'style-1' );
    } else {
  
     get_template_part( 'header', 'default' );
    }
  } else {

    get_template_part( 'header', 'default' );
  }
 } else {

  get_template_part( 'header', 'default' );
}

 
 

?>
