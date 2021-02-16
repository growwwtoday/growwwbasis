<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				
			<?php the_post(); ?>

		<?php endwhile; else : endif; ?>

		</div>
	</div>
</div>

	
	

<?php get_footer(); ?>
