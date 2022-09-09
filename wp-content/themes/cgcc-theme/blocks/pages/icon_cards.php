<div class="container-fluid icon-cards">
    <div class="row">
	    <?php if ( have_rows( 'cards' ) ) : ?>
		    <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
			    <?php $Page = get_sub_field( 'Page' ); ?>
			    <?php if ( $Page ) { ?>
                    <div class="icon-card-wrapper col-md-6 col-xl-4">
	                    <div class="icon-card">
		                    <a href="<?php echo $Page['url']; ?>" target="<?php echo $Page['target']; ?>">
			                    <div class="row align-items-center">
				                    <div class="col-2">
					                    <i class="fal fa-stethoscope"></i>
				                    </div>
				                    <div class="col-8">
					                    <?php echo $Page['title']; ?>
				                    </div>
				                    <div class="col-2 text-right">
					                    <i class="far fa-chevron-right"></i>
				                    </div>
			                    </div>
		                    </a>
	                    </div>
                    </div>
			    <?php } ?>
		    <?php endwhile; ?>
	    <?php else : ?>
		    <?php // no rows found ?>
	    <?php endif; ?>
    </div>
</div>
