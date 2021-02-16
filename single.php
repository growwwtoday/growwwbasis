<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
		<?php
		while ( have_posts() ) :
			
			the_post();

		
		endwhile; 
		?>
		</div>
    </div>
</div>

<?php get_footer(); ?>