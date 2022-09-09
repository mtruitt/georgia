<!-- <div class="block-cta">
	<div class="cancer-cta">
		<div class="row no-gutters">
			<div class="col-12 purple pl-0 pr-0">
				<div class="row no-gutters">
					<div class="col-12 col-lg-5 pl-0 pr-5 pr-lg-0">
						<div class="cancer-header-section pl-5">
							<h5 class="font-weight-bold"><?php echo get_sub_field('kicker'); ?></h5>
							<h3 class="font-weight-bold"><?php echo get_sub_field('title'); ?></h3>
							<div class="divider left white"></div>
							<p class="info mb-5"><?php echo get_sub_field('content'); ?></p>
							<?php $button = get_sub_field( 'button' ); ?>
							<?php if ( $button ) { ?>
								<a href="<?php echo $button['url']; ?>" class="btn btn-outline-light btn-lg btn-cta pl-5 pr-5 pt-3 pb-3" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-lg-7 pl-5 pr-5 pr-lg-0 quote-col">
						<div class="quote-wrapper">
							<div class="img">
								<?php $img = get_sub_field('image'); ?>
								<img src="<?php echo $img['sizes']['large']; ?>" class="img-fluid"/>
							</div>
							<div class="quote">
								<?php echo get_sub_field('testimonial'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<section class="container-fluid cta">
	<div class="row no-gutters">
		<div class="col-lg-7 order-lg-2">
			<?php $cta_image = get_sub_field('image'); ?>
			 <img src="<?php echo $cta_image['url']; ?>" alt="<?php echo $cta_image['alt']; ?>" />
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
	</div>
</section>