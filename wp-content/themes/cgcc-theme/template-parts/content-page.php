<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cgcc
 */

?>
<?php $header_background = get_field( 'header_background' ); ?>
<div class="container-fluid jumbotron jumbotron-fluid" style="background: linear-gradient( to left, transparent, transparent, rgba(0, 40, 85, .65), #002855, #002855), url(<?php echo $header_background['url']; ?>) , no-repeat top center; background-size: cover; background-position: center;">
    <div class="row no-gutters text-white">
        <div class="col-10 col-lg-8 offset-1 offset-lg-2">
            <?php
            /*
            * Custom function to pull in yoast breadcrumbs if used or our own custom breadcrumbs if not
            * Yoast gives us admin control over how they look and add SEO
            */
            compulse_breadcrumbs();
            ?>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div>
    </div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
    // Adds sub nav to page
	get_template_part('template-parts/sub', 'nav');
	// loop over the ACF flexible fields for this page / post
	while ( the_flexible_field('sections') ) {

		// load the layout from the block folder
		get_template_part( 'blocks/pages/'. get_row_layout() );

	} ?>
</article><!-- #post-<?php the_ID(); ?> -->
