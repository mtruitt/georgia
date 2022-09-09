<div id="hp-locations" class="container-fluid">
	<div class="row no-gutters align-items-center">
		<div class="col-lg-6 pr-0 position-relative z-5 order-lg-2">
			<?php $image = get_sub_field( 'image' ); ?>
			<?php if ( $image ) { ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php } ?>
			<div class="img-testimonial">
				<div class="quote">“</div>
				<?php the_sub_field( 'testimonial' ); ?>
			</div>
		</div>
		<div class="d-none d-lg-block col-12 position-relative px-0 order-3">
			<div class="location-grad-bg">
			</div>
		</div>
		<div class="col-lg-5 offset-md-1 order-lg-1">
			<?php the_sub_field( 'content' ); ?>
			<?php $button = get_sub_field( 'button'); ?>
			<?php if ( $button ) { ?>
				<a href="<?php echo $button['url']; ?>"  class="btn btn-secondary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
			<?php } ?>
		</div>
	</div>
</div>