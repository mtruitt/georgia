<div class="container-fluid centered-copy px-2 px-md-0">
	<div class="row no-gutters">
		<div class="col-lg-4 text-center mx-auto mb-4">
			<?php the_sub_field( 'content' ); ?>
		</div>
		<div class="col-12 mx-auto text-center">
			<?php $buttons = get_sub_field( 'buttons' ); ?>
			<?php if ( $buttons ) { ?>
				<a href="<?php echo $buttons['url']; ?>" class="btn btn-secondary" target="<?php echo $buttons['target']; ?>"><?php echo $buttons['title']; ?></a>
			<?php } ?>
		</div>
	</div>
</div>