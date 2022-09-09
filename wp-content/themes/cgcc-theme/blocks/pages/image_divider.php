<div class="container-fluid block-image-divider">
	<div class="row no-gutters">
		<div class="col-12 mx-auto text-center">
			<?php $image = get_sub_field('image'); ?>
			<?php if ( $image ) { ?>
				<span><img src="<?php echo $image['sizes']['img-spacer']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>"></span>
			<?php } ?>
		</div>
	</div>
</div>