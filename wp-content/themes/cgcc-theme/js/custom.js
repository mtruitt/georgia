var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var $ = jQuery;
// Progressively collapsing page navs.
function checkElementsAffectedByNavs() {
    var affectedByNavTop = 70 + 72;

    if ( $( '.progressively-collapsing-nav-wrapper' ).hasClass( 'show-more' ) ) {
        affectedByNavTop += $( '.page-nav-wrapper.more' ).innerHeight();
    }

    // Update the .affected-by-nav elements.
    $( '.page-header-overlap-image.affected-by-nav' ).css( 'top', -affectedByNavTop + 'px' );
    $( '.match-overlap-image-height.height-third.affected-by-nav' ).css( 'min-height', 'calc(33vh - ' + affectedByNavTop + 'px)' );
}

function checkProgressivelyCollapsingNavs() {
    $( '.progressively-collapsing-nav-wrapper' ).each( function() {
        var wrapper = $( this );
        var pageNavCol = wrapper.find( '.page-nav-col' );
        var navItems = pageNavCol.find( 'li:not(.more)' );

        // Determine the width of each nav item and save it.
        navItems.each( function() {
            var originalDisplay = $( this ).css( 'display' );

            $( this )
                .css( 'display', 'block' )
                .data( 'nav-width', $(this).innerWidth() )
                .css( 'display', originalDisplay );
        } );

        var availableWidth = pageNavCol.innerWidth();
        var navItemWidth = 0.0;

        navItems.each( function() {
            navItemWidth += $( this ).data( 'nav-width' );
        } );

        var moreItem = pageNavCol.find( 'li.more' );

        console.log( 'availableWidth', availableWidth );
        console.log( 'navItemWidth', navItemWidth );

        if ( availableWidth < navItemWidth ) {
            moreItem.css( 'display', 'block' );

            // Move items to the More nav.
            var moreWidth = moreItem.innerWidth();
            console.log( 'moreWidth', moreWidth );

            // Figure out the index of the last item that is visible in the nav.
            var index = 0;
            var widthRemaining = availableWidth - moreWidth;

            while ( widthRemaining > 0 ) {
                var item = $( navItems[ index ] );
                var itemWidth = item.data( 'nav-width' );

                console.log( widthRemaining, itemWidth );

                if ( widthRemaining > itemWidth ) {
                    widthRemaining -= itemWidth;
                    index++;
                } else {
                    break;
                }
            }

            var splitIndex = index;

            var moreItems = wrapper.find( '.page-nav-wrapper.more li' );
            var moreCol = wrapper.find( '.more-col' );

            // First hide everything.
            navItems.css( 'display', 'none' );
            moreItems.css( 'display', 'none' );

            // Show everything before the split in the main nav.
            navItems.slice( 0, splitIndex ).css( 'display', 'block' );

            // Show everything after the split in the "More" nav.
            moreItems.slice( splitIndex ).css( 'display', 'block' );

            moreCol.css( 'padding-right', widthRemaining + 'px' );
        } else {
            wrapper.removeClass( 'show-more' );
            navItems.css( 'display', 'block' );
            moreItem.css( 'display', 'none' );
        }

        checkElementsAffectedByNavs();
    } );
}

$( '.progressively-collapsing-nav-wrapper li.more a' ).click( function( e ) {
    $( this ).closest( '.progressively-collapsing-nav-wrapper' ).toggleClass( 'show-more' );
    checkElementsAffectedByNavs();
    e.preventDefault();
    return false;
} );

checkProgressivelyCollapsingNavs();

$( window ).resize( function() {
    window.requestAnimationFrame( function() {
        checkProgressivelyCollapsingNavs();
    } );
} );


// Progressively collapsing nav smooth scroll.
$( '.progressively-collapsing-nav-wrapper a[href^="#"]' ).click( function( e ) {
    var href = $( this ).attr( 'href' );

    var el = $( href );
    if ( el.length ) {
        var headerHeight = $( '.header-wrapper' ).innerHeight();
        var scrollTop = el.offset().top - headerHeight - 50;

        $( 'html, body' ).animate( {
            'scrollTop': scrollTop + 'px'
        }, 750 );
    }

    e.preventDefault();
    return false;
} );

// Card Hover
var container = document.querySelector('#hp-treatments');
var cards = document.querySelectorAll('#hp-treatments .card');

if (container && cards && cards.length > 0) {
    cards[1].classList.add('active');

    for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener('mouseenter', setActiveCard.bind(this, cards, cards[i]));
    }

    container.addEventListener('mouseleave', setActiveCard.bind(this, cards, cards[1]));

    function setActiveCard(cards, card, e) {
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.remove('active');
        }

        card.classList.add('active');
    }
}