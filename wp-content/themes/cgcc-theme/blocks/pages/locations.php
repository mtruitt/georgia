<section class="container-fluid locations-block">
	<div class="row no-gutters">
		<?php $image = get_sub_field( 'image' ); ?>
		<?php if ( $image ) { ?>
			<div class="col-lg-8 offset-lg-2">
				<img src="<?php echo $image['sizes']['location-image']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>" />
			</div>
		<?php } ?>
	</div>
	<?php if ( have_rows( 'locations', 'option' ) ) : ?>
	        <div class="row no-gutters justify-content-between">
	            <?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
	                <div class="location">
	                    <div class="location-title">
	                        <?php the_sub_field( 'name' ); ?>
	                    </div>
	                    <div class="location-address">
	                        <?php the_sub_field( 'address' ); ?>
	                    </div>
	                    <div class="location-info">
	                        <?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?> <?php the_sub_field( 'zip' ); ?>
	                    </div>
	                    <div class="location-phone mb-4">
		                    <a href="tel:<?php the_sub_field( 'phone' ); ?>"><?php the_sub_field( 'phone' ); ?></a>
	                    </div>
		                <div class="location-directions font-italic">
			                <?php the_sub_field( 'directions' ); ?>
		                </div>
		                <div class="location-link">
							<?php $address = get_sub_field('address'); ?>
							<?php $city = get_sub_field('city'); ?>
							<?php $state = get_sub_field('state'); ?>
							<?php $zip = get_sub_field('zip'); ?>
							<?php $fullAddress = $address . ' ' .  $city . ' ' . $state . ' ' . $zip; ?>
							<?php $addressString = str_replace(",","",$fullAddress); ?>
			                <a href="https://www.google.com/maps/dir//<?=urlencode($addressString)?>" target="_blank">Visit Location</a>
		                </div>
	                </div>
	            <?php endwhile; ?>
	        </div>
	<?php endif; ?>
</section>