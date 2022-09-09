<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cgcc
 */

get_header();
?>

    <div id="primary" class="page-wrapper">
        <div class="container">
            <div class="row">

                <main id="main" class="site-main<?php echo is_active_sidebar( 'sidebar-1' ) ? ' col-9' : ' col-12'; ?>">

                    <?php
                    while ( have_posts() ) : the_post();

	                    get_template_part( 'template-parts/content', get_post_type() );

	                    the_post_navigation();

	                    // If comments are open or we have at least one comment, load up the comment template.
//	                    if ( comments_open() || get_comments_number() ) :
//		                    comments_template();
//	                    endif;

                    endwhile; // End of the loop.
                    ?>

		        </main><!-- #main -->
                <?php get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .container -->
	</div><!-- #primary -->

<?php

get_footer();
