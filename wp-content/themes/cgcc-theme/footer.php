<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cgcc
 */

?>
<?php $footer_background = get_field( 'footer_background', 'option' ); ?>
<footer id="colophon" class="site-footer text-white" style="background: url(<?php echo $footer_background['url']; ?>) no-repeat center center; background-size: cover;">
    <div id="footer-header">
        <div id="footer-header-container">
            <div class="row no-gutters">
                <div class="d-none col-lg-6 d-lg-flex align-content-center">
                    <div id="footer-logo">
	                    <?php $footer_logo = get_field( 'footer_logo', 'option' ); ?>
	                    <?php if ( $footer_logo ) { ?>
                            <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" class="img-fluid" />
	                    <?php } ?>
                    </div>
                </div>
                <div id="footer-locations" class="col-lg-6">
                    <div class="row no-gutters">
	                <?php if ( have_rows( 'locations', 'option' ) ) : ?>
		                <?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
                            <div class="col-md-6">
                                <div class="location-city">
	                                <?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?>
                                </div>
                                <div class="location-phone">
                                    <a href="tel:<?php the_sub_field( 'phone' ); ?>"><?php the_sub_field( 'phone' ); ?></a>
                                </div>
                                <div class="location-address">
                                    <?php $address = get_sub_field('address'); ?>
                                    <?php $city = get_sub_field('city'); ?>
                                    <?php $state = get_sub_field('state'); ?>
                                    <?php $zip = get_sub_field('zip'); ?>
                                    <?php $fullAddress = $address . ' ' .  $city . ' ' . $state . ' ' . $zip; ?>
                                    <?php $addressString = str_replace(",","",$fullAddress); ?>
                                    <a href="https://www.google.com/maps/dir//<?=urlencode($addressString)?>" target="_blank"><?php the_sub_field( 'address' ); ?></a>
                                </div>
                            </div>
		                <?php endwhile; ?>
	                <?php else : ?>
		                <?php // no rows found ?>
	                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-links">
            <div class="row no-gutters">
                <nav id="footer-navigation" class="col-12">
		            <?php
		            wp_nav_menu( array(
			            'theme_location' => 'quick-menu',
			            'menu_id'        => 'quick-links',
			            'menu_class'     => 'd-flex flex-wrap flex-row justify-content-around'
		            ) );
		            ?>
                </nav><!-- #site-navigation -->
            </div>
    </div>
    <div id="site-info">
            <div class="row no-gutters">
                <div class="col-md-6">
					<?php echo do_shortcode('[copyright]'); ?>
                </div>
                <div class="col-md-6 text-left text-md-right">
					<?php if ( have_rows( 'social_media', 'option' ) ) : ?>
						<?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
                            <a href="<?php the_sub_field( 'link' ); ?>" class="mx-3" target="_blank"><i class="fab fa-<?php the_sub_field( 'platform' ); ?>"></i></a>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
                    <a href="<?php echo get_field( 'sitemap_page', 'option' ); ?>" class="ml-3"><?php the_field( 'sitemap_label', 'option' ); ?></a>
                </div>
            </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
