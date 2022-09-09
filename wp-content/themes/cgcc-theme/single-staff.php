<?php get_header(); ?>
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

<div class="content-left-image-right-testimonial">
	<div class="container-fluid">
		<div class="row no-gutters">
	        <div class="col-lg-6 content">
	            <h3><?php the_field( 'title' ); ?></h3>
				<?php the_field( 'bio' ); ?>
	        </div>
			<div class="col-lg-6 image">
                <div class="image-wrapper position-relative">
		            <?php the_post_thumbnail('full'); ?>
		            <?php $quote = get_field( 'quote' ); ?>
		            <?php if ($quote) : ?>
					<blockquote>
						<div class="quotation">“</div>
						<?php echo $quote; ?>
		            </blockquote>
		            <?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>