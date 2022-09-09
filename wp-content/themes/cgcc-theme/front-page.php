<?php
/**
 * The template for the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cgcc
 */

get_header();
?>

    <?php $header_bg_img = get_field( 'header_bg_img' ); ?>
    <div class="jumbotron jumbotron-fluid vertical-align overflow-hidden" style="background: linear-gradient( to left, transparent, transparent, rgba(0, 40, 85, .9), #002855), url(<?php echo $header_bg_img['sizes']['header-img']; ?>) no-repeat top center; background-size: cover; ">
        <div class="text-white">
            <h1 class="display-3"><strong><?php the_field( 'header_primary_title' ); ?></strong>
            <?php the_field( 'secondary_line' ); ?></h1>
	        <?php the_field( 'header_content' ); ?>
            <a class="btn btn-primary btn-lg" href="<?php the_field( 'header_button_link' ); ?>" title="<?php the_field( 'header_button_title_text' ); ?>" role="button"><?php the_field( 'header_button_text' ); ?></a>
        </div>
    </div>
    <div id="primary" class="content-area">
        <div id="hp-treatments" class="container-fluid">
            <div class="row no-gutters">
	            <?php if ( have_rows( 'card' ) ) : ?>
		            <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-pre-title text-center"><?php the_sub_field( 'card-pre-title' ); ?></p>
                                    <h5 class="card-title text-center"><?php the_sub_field( 'card-title' ); ?></h5>
	                                <?php $card_img = get_sub_field( 'card-img' ); ?>
	                                <?php if ( $card_img ) { ?>
                                        <img src="<?php echo $card_img['sizes']['card-img']; ?>" alt="<?php echo $card_img['alt']; ?>" />
	                                <?php } ?>
                                        <p class="card-text"><?php the_sub_field( 'content' ); ?></p>
                                    <div class="card-footer text-center">
                                        <a href="<?php the_sub_field( 'card-link' ); ?>" class="" alt="<?php the_sub_field( 'card_link_seo_title' ); ?>"><?php the_sub_field( 'card_link_text' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
		            <?php endwhile; ?>
	            <?php else : ?>
		            <?php // no rows found ?>
	            <?php endif; ?>
            </div>
        </div>
        <div id="hp-team" class="container-fluid">
            <div class="row no-gutters">
                <div class="offset-1 offset-lg-3 col-10 col-lg-6 mb-5 text-center">
                    <p class="hp-team-pre-title"><?php the_field( 'team_pre-title' ); ?></p>
                    <h2>
	                    <?php the_field( 'team_title' ); ?>
                    </h2>
	                    <?php the_field( 'team_content' ); ?>
                </div>
                <div class="offset-1 offset-lg-2 col-10 col-lg-8">
                    <div class="row no-gutters mb-5">
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
                                <div class="col-12 col-lg-6 col-xl-3 px-md-3">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hp-profile' ); ?>" alt="">
                                        <div class="cgcc-title"><?php the_title(); ?></div>
                                        <div class="cgcc-position"><?php the_field( 'title' ); ?></div>
                                    </a>
                                </div>
	                    <?php endwhile;
                        endif;
                        /* Restore original Post Data */
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="col-12 text-center mb-5">
                    <a href="<?php the_field( 'team_button_link' ); ?>" title="<?php the_field( 'button_seo_title' ); ?>" class="btn btn-secondary"><?php the_field( 'team_button_text' ); ?></a>
                </div>
            </div>
        </div>
        <section class="container-fluid cta">
            <div class="row no-gutters">
                <div class="col-lg-7 order-lg-2">
                    <?php $image = get_field('hp_cta_image'); ?>
			        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
                    <blockquote>
                        <div class="quotation">“</div>
                        <?php echo get_field('hp_cta_testimonial'); ?>
                    </blockquote>
                <div class="col-lg-5 order-lg-1">
                    <h2>
                        <span><?php echo get_field('hp_cta_kicker'); ?></span>
                        <?php echo get_field('hp_cta_title'); ?>
                    </h2>
                    <?php echo get_field('hp_cta_content'); ?>
                    <?php $button = get_field( 'hp_cta_button' ); ?>
                    <?php if ( $button ) : ?>
                        <a href="<?php echo $button['url']; ?>" class="btn btn-outline-light btn-lg" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <div id="testimonials">
            <div class="container-fluid px-2 px-md-0">
                <div class="row no-gutters">
                    <div class="col-12 mb-5">
                        <p class="hp-test-pre-title text-center"><?php the_field( 'test_pre_title' ); ?></p>
                        <h2 class="text-center">
	                        <?php the_field( 'test_title' ); ?>
                        </h2>
                    </div>
                    <div class="d-none d-lg-block col-lg-6 pl-0">
	                    <?php $test_left_image = get_field( 'test_left_image' ); ?>
	                    <?php if ( $test_left_image ) { ?>
                            <img src="<?php echo $test_left_image['url']; ?>" alt="<?php echo $test_left_image['alt']; ?>" />
	                    <?php } ?>
                    </div>
                    <div class="col-lg-6 overflow-hidden">
	                    <?php if ( have_rows( 'testimonials' ) ) : ?>
                            <div class="row no-gutters h-100 justify-content-around">
                                <div class="col-lg-6">
                                    <div class="testimonials position-relative">
                                        <div id="left-quotes">
                                            <img src="<?php echo get_template_directory_uri() . '/images/test_quote_left.png' ?>" ><img src="<?php echo get_template_directory_uri() . '/images/test_quote_left.png' ?>" >
                                        </div>
                                        <div class="glide-wrapper">
                                            <div class="glide__track" data-glide-el="track">
                                                <ul class="glide__slides">
                                                    <?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
                                                        <li class="glide__slide"><?php the_sub_field( 'testimonial_content' ); ?></li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            </div>
                                            <div class="glide__bullets" data-glide-el="controls[nav]">
	                                            <?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
                                                    <button class="glide__bullet" data-glide-dir="=<?php echo get_row_index(); ?>"></button>
	                                            <?php endwhile; ?>
                                            </div>
                                        </div>
                                        <div id="right-quotes">
                                            <img src="<?php echo get_template_directory_uri() . '/images/test_quote_right.png' ?>" ><img src="<?php echo get_template_directory_uri() . '/images/test_quote_right.png' ?>" >
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    new Glide('.testimonials', {
                                        type: 'carousel',
                                        autoplay: 2500,
                                        keyboard: true,
                                        startAt: 0
                                    }).mount();
                                </script>
                            </div>
	                    <?php else : ?>
		                    <?php // no rows found ?>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-text-divider d-none d-md-flex justify-content-center">
            <h3>
                <div>
                    <?php echo get_bloginfo ( 'description' ); ?>
                </div>
            </h3>
        </div>
        <div id="hp-locations" class="container-fluid">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-6 pr-0 position-relative z-5 order-lg-2">
	                    <?php $locations_image = get_field( 'locations_image' ); ?>
	                    <?php if ( $locations_image ) { ?>
                            <img src="<?php echo $locations_image['url']; ?>" alt="<?php echo $locations_image['alt']; ?>" />
	                    <?php } ?>
                        <div class="img-testimonial">
                            <div class="quote">“</div>
	                        <?php the_field( 'locations_quote' ); ?>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-12 position-relative px-0 order-3">
                        <div class="location-grad-bg">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-md-1 order-lg-1">
                        <p class="locations-pre-title"><?php the_field( 'locations_pre_title' ); ?></p>
                        <h2>
		                    <?php the_field( 'locations_title' ); ?>
                        </h2>
                        <div class="locations">
                            <div class="row">
                                <?php if ( have_rows( 'locations', 'option' ) ) : ?>
                                    <?php while ( have_rows( 'locations', 'option' ) ) : the_row(); ?>
                                        <div class="col-md-5">
                                            <div class="location-title">
	                                            <?php the_sub_field( 'name' ); ?>
                                            </div>
                                            <div class="location-address">
	                                            <?php the_sub_field( 'address' ); ?>
                                            </div>
                                            <div class="location-city">
	                                            <?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?> <?php the_sub_field( 'zip' ); ?>
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
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php

get_footer();