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

?>

<section id="footer" style="background: url('https://demo.darwinssv.com/multidots/wp-content/uploads/2022/08/footer_bg.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="footer-logo">
                <img src="https://demo.darwinssv.com/multidots/wp-content/uploads/2022/08/footer_logo.png">
            </div>
            <div class="footer-menu">
            <?php
            wp_nav_menu( array(
                'menu' => 'Footer Menu',
                'menu_id' => 'footer-menu'
            ));
            ?>
            </div>
            <div class="copyright">
                <p class="footer-link-text">@ <?php echo date( 'Y' ) ?> Artistpoint is powered by <a class="footer-link" href="#" target="_blank">DotStore.</a></p>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

</body>
</html>
