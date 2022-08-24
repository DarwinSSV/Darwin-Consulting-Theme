<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package darwinconsulting
 */

if( function_exists( 'myprefix_get_theme_option' ) ) {
   
   $footer = myprefix_get_theme_option( 'footer-style' );

   if( $footer ) {
   
      if( $footer == '2' ) {

         get_template_part( 'footer', 'style-1' );
      } else {

         get_template_part( 'footer', 'default' );
      }
   } else {

      get_template_part( 'footer', 'default' );
   }
} else {

   get_template_part( 'footer', 'default' );
}

?>
