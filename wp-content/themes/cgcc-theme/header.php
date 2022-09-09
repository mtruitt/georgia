<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cgcc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <?php wp_head(); ?>
        <script src="https://kit.fontawesome.com/0c5f4b5e20.js" crossorigin="anonymous"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php
        /*
         * Fire the wp_body_open action.
         * Used for adding custom scripts after body open.
         * Example: GTM
         */
        wp_body_open();
        ?>
        <div id="page" class="site">
            <?php // Accessibility to skip to content ?>
            <a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'cgcc' ); ?></a>
            <nav class="navbar d-xl-none mobile-navbar">
                <div class="col-12">
                    <div class="site-branding">
                        <?php
                        the_custom_logo(); ?>
                    </div>
                </div>
                <div class="col-12 px-0">
                    <nav class="quick-links-nav d-none d-sm-block d-xl-none">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'header-quick-menu',
                            'menu_id'        => 'header-quicklinks',
                            'menu_class'     => 'nav',
                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'         => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                    </nav><!-- #site-navigation -->
                </div>
                <div class="col-12 p-0 d-flex align-items-center">
                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'nav',
                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'         => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                    </nav>
                    <button class="navbar-toggler border-0 ml-auto d-flex align-items-center justify-content-center" type="button" data-toggle="offcanvas">
                        <p>More</p>
                        <div class="navbar-toggler-circle">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="close d-none" aria-hidden="true">&times;</span>
                        </div>
                    </button>
                </div>
            </nav>

            <header id="masthead" class="site-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="site-branding col-md-3 d-none d-xl-flex align-content-center justify-content-center flex-column">
		                    <?php
		                    the_custom_logo();
		                    ?>
                        </div><!-- .site-branding -->
                        <div class="col-md-9 pr-md-5">
                            <div id="header-quicklinks" class="border-bottom d-none d-xl-block">
                                <nav id="site-quick-links-navigation" class="main-navigation d-none d-xl-block">
		                            <?php
		                            wp_nav_menu( array(
			                            'theme_location' => 'header-quick-menu',
			                            'menu_id'        => 'header-quicklinks',
			                            'menu_class'     => 'nav',
			                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			                            'walker'         => new WP_Bootstrap_Navwalker(),
		                            ) );
		                            ?>
                                </nav><!-- #site-navigation -->
                            </div>
                            <nav id="site-navigation" class="main-navigation d-none d-xl-block">
		                        <?php
		                        wp_nav_menu( array(
			                        'theme_location' => 'primary-menu',
			                        'menu_id'        => 'primary-menu',
			                        'menu_class'     => 'nav',
			                        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			                        'walker'         => new WP_Bootstrap_Navwalker(),
		                        ) );
		                        ?>
                            </nav><!-- #site-navigation -->
                        </div>
                    </div>
                </div>
            </header><!-- #masthead -->