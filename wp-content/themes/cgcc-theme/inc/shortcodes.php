<?php

add_shortcode( 'copyright', 'copyright_info' );
function copyright_info() {

	printf( '&copy %1$d <a href="%2$s" title="%3$s">%3$s</a>. Design by <a href="%4$s" title="%5$s" target="_blank">%5$s</a>',
		date('Y'),
		esc_url( home_url( '/' ) ),
		get_bloginfo( 'name' ) ,
		'https://compulse.com/',
		'Compulse.');

}

add_shortcode( 'cgcc_physicians', 'display_cgcc_physicians' );
function display_cgcc_physicians( $atts ) {
	$atts = shortcode_atts( array(
		'position' => 'physicians'
	), $atts );

	$args = array(
		'post_type'      => 'staff',
		'post_status'    => 'publish',
		'posts_per_page' => - 1,
		'orderby'        => 'menu',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'position',
				'field'    => 'slug', //can be set to ID
				'terms'    => $atts['position']
			)
		)
	);

	$loop = new WP_Query( $args );
	if ( $loop ) : ?>
        <div id="physicians" class="container mb-5">
            <div class="row">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-md-6 col-lg-3">
						<a href="<?php echo get_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hp-profile' ); ?>" alt=""
                             class="img-fluid">
                        <div class="cgcc-title"><?php the_title(); ?></div>
						<div class="cgcc-position"><?php the_field( 'title' ); ?></div>
						</a>
                    </div>

				<?php endwhile; ?>
            </div>
		</div>
		<section class="container-fluid">
			<div class="offset-1 offset-lg-2 col-10 col-lg-8">
				<div class="row no-gutters justify-content-between mb-5">
					<?php
					$args = array(
						'post_type' => 'staff',
						'orderby'   => 'menu_order',
						'order'     => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'position',
								'field' => 'slug', //can be set to ID
								'terms' => get_field( 'team_positions_to_display' )
							)
						)
					);
					$the_query = new WP_Query( $args );

					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="col-md-6 col-lg-3">
								<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hp-profile' ); ?>" alt="">
								<div class="cgcc-title"><?php the_title(); ?></div>
								<div class="cgcc-position"><?php the_field( 'title' ); ?></div>
							</div>
					<?php endwhile;
					endif;
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
				</div>
			</>
		</section>
	<?php endif;
	/* Restore original Post Data */
	wp_reset_postdata();
}

add_shortcode( 'staff_members', 'display_staff_members' );
function display_staff_members( $atts ) {
	$atts = shortcode_atts( array(
		'position' => 'physicians'
	), $atts );

	$args = array(
		'post_type'      => 'staff',
		'post_status'    => 'publish',
		'posts_per_page' => - 1,
		'orderby'        => 'menu',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'position',
				'field'    => 'slug', //can be set to ID
				'terms'    => $atts['position']
			)
		)
	);

	$loop = new WP_Query( $args );
	if ( $loop ) : ?>
		<div id="general-staff" class="container mb-5">
			<div class="row">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="<?php echo $loop->post_count == 1 ? 'col-6 col-lg-2 mx-auto' : 'col-md-6 col-lg-2'; ?>">
						<a href="<?php echo get_permalink(); ?>">
							<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ap-staff' ); ?>" alt="">
							<div class="cgcc-title"><?php the_title(); ?></div>
						</a>
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	<?php endif;
	/* Restore original Post Data */
	wp_reset_postdata();
}