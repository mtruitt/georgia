
<div class="content-left-image-right-testimonial">
    <div class="container-fluid px-0">
		<div class="row no-gutters">
	        <div class="col-12 col-lg-6 content">
				<?php the_sub_field( 'content' ); ?>
				<?php $button = get_sub_field( 'button' ); ?>
				<?php if ( $button ) { ?>
					<a href="<?php echo $button['url']; ?>" class="btn btn-primary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				<?php } ?>
	        </div>
			<div class="col-12 col-lg-6 image">
                <div class="image-wrapper position-relative">
					<?php $image = get_sub_field( 'image' ); ?>
					<?php if ( $image ) { ?>
						<img src="<?php echo $image['sizes']['content_left_image_right_testimonial']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php } ?>
					<blockquote>
						<div class="quotation">“</div>
						<?php the_sub_field( 'testimonial' ); ?>
					</blockquote>
                </div>
			</div>
		</div>
    </div>
</div>
