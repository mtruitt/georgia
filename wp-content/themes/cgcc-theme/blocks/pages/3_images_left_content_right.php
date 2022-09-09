<section class="container-fluid three-images-left-content-right px-0">
    <div class="row no-gutters align-items-start">
        <div class="col-lg-6 images">
            <div class="row no-gutters">
                <div class="col-12 px-0">
	                <?php $large_image = get_sub_field( 'large_image' ); ?>
	                <?php if ( $large_image ) { ?>
                        <img src="<?php echo $large_image['sizes']['lg-img']; ?>" alt="<?php echo $large_image['alt']; ?>" />
	                <?php } ?>
                </div>
                <div class="col-7 px-0">
		            <?php $medium_image = get_sub_field( 'medium_image' ); ?>
		            <?php if ( $medium_image ) { ?>
                        <img src="<?php echo $medium_image['sizes']['md-img']; ?>" alt="<?php echo $medium_image['alt']; ?>" />
		            <?php } ?>
                </div>
                <div class="col-5 px-0">
	                <?php $small_image = get_sub_field( 'small_image' ); ?>
	                <?php if ( $small_image ) { ?>
                        <img src="<?php echo $small_image['sizes']['sm-img']; ?>" alt="<?php echo $small_image['alt']; ?>" />
	                <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 bg-light-blue content">
            <?php the_sub_field( 'content' ); ?>
            <?php $button = get_sub_field( 'button' ); ?>
            <?php if ( $button ) { ?>
                <a href="<?php echo $button['url']; ?>" class="btn btn-primary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            <?php } ?>
        </div>
    </div>
</section>