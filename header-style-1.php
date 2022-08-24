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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<section id="header-style-1">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-sm-4 col-md-4">
                <?php

                $site_logo = myprefix_get_theme_option( 'site-logo' );
                if( $site_logo ) {
                ?>
                <img src="<?php echo $site_logo ?>">
                <?php

                } else {
                ?>
                <img src="" alt="Site Logo">
                <?php
                }
                ?>
            </div>
            
            <div id="header-menu" class="col-sm-8 col-md-8">
                <?php
                echo wp_nav_menu(
                    array(
                        'menu_id' => 'header-menu',
                        'menu' => 'Menu 1'
                    )
                );
                ?>
            </div>

            <div id="mobile-header-menu" class="col-sm-8 col-md-8">
                <a class="toggle-nav" href="#">&#9776;</a>
                <nav class="menu main">
                <?php
                
                echo wp_nav_menu(
                    array(
                        'menu_id' => 'header-menu',
                        'container_class' => 'main-nav',
                        'menu' => 'Menu 1'
                    )
                );
                ?>
                </nav>
            </div>
        </div>
    </div>
</section>