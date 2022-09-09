<?php
// Grab Page ID
$page_ID = get_the_id();
// Get slub of page to check against
$page_slug = $post->post_name;
// Find out if current page has children
$children = get_pages( array( 'child_of' => $page_ID ) );
// Get list of Menu Locations to pull a custom menu from
$menuLocations = get_nav_menu_locations();

// Check against page slug to see what menu we should display
switch ($page_slug) {
    case in_array( $page_slug, array('what-we-treat', 'cancer', 'blood-disorders') ) :
        $menuID = $menuLocations['what-we-treat'];
        break;
    case in_array( $page_slug, array('becoming-a-patient', 'clinical-trials') ) :
	    $menuID = $menuLocations['becoming-a-patient'];
        break;
	case in_array( $page_slug, array('for-patients', 'dr-hendricks-welcome-letter', 'your-cgcc-care-team', 'the-cgcc-pharmacy') ) :
		$menuID = $menuLocations['for-patients'];
		break;
	case in_array( $page_slug, array('about', 'why-cgcc', 'locations', 'vision-mission', 'careers') ) :
		$menuID = $menuLocations['about'];
		break;
	case in_array( $page_slug, array('second-opinion') ) :
		$menuID = $menuLocations['second-opinion'];
		break;
}

$menu = wp_get_nav_menu_items($menuID);

if( $menu ) : ?>
	<div class="progressively-collapsing-nav-wrapper mb-5">
        <div class="row no-gutters page-nav-wrapper">
            <div class="offset-1 col-7 col-xl-6 page-nav-col">
                <ul class="nav page-nav">
                    <?php foreach ( $menu as $navItem ) : ?>
                        <?php // d($navItem->ID); ?>
                        <?php if ( $navItem->ID == get_the_ID() ) { $current = ' current'; } else { $current = ''; } ?>
                        <li class="<?php echo $current; ?>"><a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?></a></li>
                    <?php endforeach; ?>

                    <li class="more">
                        <a href="#">More <i class="fas fa-chevron-down"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row no-gutters page-nav-wrapper more">
            <div class="more-col col-12">
                <ul class="nav page-nav">
	                <?php foreach ( $menu as $navItem ) : ?>
		                <?php if ( $navItem->ID == get_the_ID() ) { $current = ' current'; } else { $current = ''; } ?>
                        <li class="<?php echo $current; ?>"><a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?></a></li>
	                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="progressively-collapsing-nav-wrapper mb-5"></div>
<?php endif; ?>
