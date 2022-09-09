<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cgcc
 */

// Easy reference for current ID
$cid = get_the_ID();
?>
<?php $header_background = get_field( 'header_background' ); ?>
<div class="container-fluid jumbotron jumbotron-fluid" style="background: linear-gradient( to left, transparent, #002855), url(<?php echo $header_background['url']; ?>) no-repeat top center; background-size: cover;">
    <div class="row no-gutters text-white">
        <div class="col-10 col-lg-8 offset-1 offset-lg-2">
            <?php
            /*
            * Custom function to pull in yoast breadcrumbs if used or our own custom breadcrumbs if not
            * Yoast gives us admin control over how they look and add SEO
            */
            compulse_breadcrumbs();
            ?>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div>
    </div>
</div>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
		<?php

		// CANCER TYPE NAVIGATION
		// ----------------------------
		$args = array(
			'post_type' => 'cancer',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
        );

        $loop = new WP_Query( $args );
        
		if ( $loop ) : ?>
            <div class="progressively-collapsing-nav-wrapper">
                <div class="row no-gutters page-nav-wrapper">
                    <div class="offset-1 col-7 col-xl-6 page-nav-col">
                        <ul class="nav page-nav">
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php if ( $cid == get_the_ID() ) { $current = ' current'; } else { $current = ''; } ?>
                                <li class="<?php echo $current; ?>"><a href="<?php echo get_permalink(); ?>"><?php echo str_replace(" Cancer", "", get_the_title()); ?></a></li>
                            <?php endwhile; ?>

                            <li class="more">
                                <a href="#">More <i class="fas fa-chevron-down"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row no-gutters page-nav-wrapper more">
                    <div class="more-col col-12">
                        <ul class="nav page-nav">
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php if ( $cid == get_the_ID() ) { $current = ' current'; } else { $current = ''; } ?>
                                <li class="<?php echo $current; ?>"><a href="<?php echo get_permalink(); ?>"><?php echo str_replace(" Cancer", "", get_the_title()); ?></a></li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            </div>
		<?php endif;
		wp_reset_postdata();

		// CONTENT HEADER SECTION
		// ----------------------------
		?>
        <div class="cancer-header-section text-center">
                <h2>
                    <span><?php the_title(); ?></span>
                    What is <?php the_title(); ?>?
                </h2>
        </div>

		<?php
		// IMAGES, INTRO, SYMPTOMS
		// ----------------------------
		?>


        <section class="container-fluid three-images-left-content-right px-0">
            <div class="row no-gutters align-items-start">
                <div class="col-lg-6 images">
                    <div class="row no-gutters">
                        <?php
                            if ( have_rows('cancer_images', $cid) ) {
                                echo '<div class="row no-gutters">';
                                echo '<div class="col-12 px-0">';
                                while ( have_rows('cancer_images', $cid) ) {
                                    the_row();
                                    $img = get_sub_field('image');
                                    $row = get_row_index();
                                    if ( $row == 2 ) { echo '</div><div class="col-7 px-0">'; }
                                    elseif ( $row == 3 ) { echo '</div><div class="col-5 px-0">'; }
                                    echo '<img src="'.$img['sizes']['large'].'" title="'.$img['title'].'" alt="'.$img['alt'].'" class="img-fluid" />';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 bg-light-blue mb-0 mb-md-5 content">
                    <div id="cancer-intro">
						<?php the_field( 'cancer_intro' ); ?>
                    </div>
                    <br />
                    <div id="cancer-symptoms">
						<?php the_field( 'cancer_symptoms' ); ?>
                    </div>
                </div>
            </div>
        </section>


        <div class="container-fluid">
            <div class="row mt-5">
					<?php
					// CANCER TYPES GRID
					if ( get_field('cancer_types') ) {
						?>
                        <div class="col-10 offset-1 cancer-header-section">
                            <div id="cancer-types" class="container-fluid">
                                <h2 class="text-center">
                                    <span>Types of <?php echo get_the_title(); ?></span>    
                                    <?php echo get_field('cancer_types_header'); ?>
                                </h2>
                                <p class="intro text-center"><?php echo get_field('cancer_types'); ?></p>
                                <div class="types_list mt-5">
									<?php
									if ( have_rows('cancer_types_list') ) {
										echo '<div class="row no-gutters">';
										while ( have_rows('cancer_types_list') ) {
											the_row();
											echo '<div class="col-md-6 col-xl-4">';
											echo '<div class="single-type">';
											echo '<h3>'.get_sub_field('heading').'</h3>';
											echo '<p>'.get_sub_field('type').'</p>';
											echo '</div>';
											echo '</div>';
										}
										echo '</div>';
									}
									?>
                                </div>
                            </div>
                        </div>
					<?php } ?>
            </div>
        </div>


        <section class="container-fluid cta">
            <div class="row no-gutters">
                <div class="col-lg-7 order-lg-2">
                    <?php $image = get_field('cta_image'); ?>
                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid"/>
                </div>
                    <blockquote>
                        <div class="quotation">“</div>
                        <?php echo get_field('cta_testimonial'); ?>
                    </blockquote>
                <div class="col-lg-5 order-lg-1">
                    <h2>
                        <span><?php the_field( 'cta_kicker' ); ?></span>
                        <?php the_field( 'cta_title' ); ?>
                    </h2>
                    <?php the_field( 'cta_content' ); ?>
                    <?php $cta_button = get_field( 'cta_button' ); ?>
                    <?php if ( $cta_button ) { ?>
                        <a href="<?php echo $cta_button['url']; ?>" class="btn btn-outline-light btn-lg" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="row mt-5">
					<?php

					// CANCER QUESTIONS GRID
					if ( get_field('cancer_questions') ) { ?>
                        <div class="col-10 offset-1 cancer-header-section">
                            <div id="cancer-questions" class="container-fluid">
                                <h2 class="text-center">
                                    <span>Questions</span>    
                                    Questions For Your Doctor
                                </h2>
                                <p class="intro text-center"><?php echo get_field('cancer_questions'); ?></p>
                                <div class="questions_list">
									<?php
									if ( have_rows('cancer_questions_list') ) {
										echo '<div class="row">';
										while ( have_rows('cancer_questions_list') ) {
											the_row();
											echo '<div class="col-md-6 col-xl-4"><div class="single-question">'.get_sub_field('question').'</div></div>';
										}
									}
									?>
                                </div>
                            </div>
                        </div>
					<?php } ?>
            </div>
        </section>

        <section id="hp-locations" class="container-fluid">
            <div class="row no-gutters align-items-center">
                <div class="col-lg-6 pr-0 position-relative z-5 order-lg-2">
                    <?php $image = get_field( 'pre-footer_image' ); ?>
                    <?php if ( $image ) { ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php } ?>
                    <div class="img-testimonial">
                        <div class="quote">“</div>
                        <?php the_field( 'pre-footer_testimonial' ); ?>
                    </div>
                </div>
                <div class="d-none d-lg-block col-12 position-relative px-0 order-3">
                    <div class="location-grad-bg">
                    </div>
                </div>
                <div class="col-lg-5 offset-md-1 order-lg-1">
                    <h2>
                        <span><?php the_field( 'pre-footer_kicker' ); ?></span>
                        <?php the_field( 'pre-footer_title' ); ?>
                    </h2>
                    <?php the_field( 'pre-footer_content' ); ?>
                    <?php $button = get_field( 'pre-footer_button' ); ?>
                    <?php if ( $button ) { ?>
                        <a href="<?php echo $button['url']; ?>" class="btn btn-secondary" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div><!-- .entry-content -->
</main><!-- #post-<?php the_ID(); ?> -->
