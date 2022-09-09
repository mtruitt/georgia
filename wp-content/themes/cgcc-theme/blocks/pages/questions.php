<div class="block-questions">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12">
				<div id="cancer-questions" class="container-fluid">
					<div class="questions_list mt-5">
						<?php
						if ( have_rows('questions') ) {
							echo '<div class="row">';
							while ( have_rows('questions') ) {
								the_row();
								echo '<div class="col-md-6 col-lg-4">';
								echo '<div class="single-question">' . get_sub_field( 'question' ) . '</div>';
								echo '</div>';
							}
							echo '</div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>