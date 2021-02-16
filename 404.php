<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blueprint' ); ?></h1>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blueprint' ); ?>
			<?php get_search_form(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>