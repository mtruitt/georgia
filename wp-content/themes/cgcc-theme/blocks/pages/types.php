<section class="container-fluid block-types">
	<div class="row">
		<div class="offset-1 col-10">
		<?php if ( have_rows('types') ) :?>
			<div class="row">
				<?php while ( have_rows('types') ) : the_row();
					echo '<div class="col-md-6 col-lg-4">';
					echo '<div class="single-type">';
					echo '<h3>'. get_sub_field('header').'</h3>';
					echo '<p>'. get_sub_field('type').'</p>';
					echo '</div>';
					echo '</div>';
				endwhile; ?>
			</div>
		<?php endif; ?>
			</div>
	</div>
</section>