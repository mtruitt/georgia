
<div class="container-fluid second-opinion-block px-2 px-md-0">
	<div class="row no-gutters">
		<div class="col-12 col-md-5 offset-md-1 pt-4">
			<div class="row">
				<div class="col-12 col-md-10">
					<?php the_sub_field( 'content' ); ?>
					<?php $button = get_sub_field( 'button' ); ?>
					<?php if ( $button ) { ?>
						<a href="<?php echo $button['url']; ?>" class="btn btn-primary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<?php $image = get_sub_field( 'image' ); ?>
			<?php if ( $image ) { ?>
				<img src="<?php echo $image['sizes']['content_left_image_right_testimonial']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>" />
			<?php } ?>
			<div class="img-testimonial">
				<div class="quote"><i class="fad fa-quote-left"></i></div>
				<?php the_sub_field( 'testimonial' ); ?>
			</div>
		</div>
	</div>
</div>

<section class="row no-gutters cta">
	<div class="col-lg-7 order-lg-2">
		<img src="<?php echo $img['sizes']['large']; ?>" />
	</div>
		<blockquote>
			<div class="quotation">“</div>
			<?php echo get_sub_field('testimonial'); ?>
		</blockquote>
	<div class="col-lg-5 order-lg-1">
		<h2>
			<span><?php echo get_sub_field('kicker'); ?></span>
			<?php echo get_sub_field('title'); ?>
		</h2>
		<?php the_sub_field('content'); ?>
		<?php $button = get_sub_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<a href="<?php echo $button['url']; ?>" class="btn btn-outline-light btn-lg" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
		<?php endif; ?>
	</div>
</section>
