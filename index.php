<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			while ( have_posts() ) :
				
				the_post();
			endwhile; else : endif; ?>
		</div>
	</div>
</div>

<div class="container my-4">
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12">
			<h1>hello, h1 tekst over meerdere regels</h1>
			<p class="lead">This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the <a href="#">RFS algorithm</a> to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<h2>hello, h2 tekst over meerdere regels</h2>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<h3>hello, h3 tekst over meerdere regels</h3>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<h4>hello, h4 tekst over meerdere regels</h4>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calwculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<h5>hello, h5 tekst over meerdere regels</h5>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>
			<h6>hello, h6 tekst over meerdere regels</h6>
			<p>This text automatically rescales thanks to the RFS mixin. It uses the RFS algorithm to automatically calculate the appropriate font size based on the dimensions of the monitor or device. </p>

			<h1 class="display-1">hello, display-1 tekst over meerdere regels</h1>
			<h2 class="display-2">hello, display-2 tekst over meerdere regels</h2>
			<h3 class="display-3">hello, display-3 tekst over meerdere regels</h3>
			<h4 class="display-4">hello, display-4 tekst over meerdere regels</h4>

			<button type="button" class="btn btn-primary btn-lg">Primary</button>
			<button type="button" class="btn btn-secondary btn-sm">Primary</button>

	
		</div>
	</div>
</div>
	



<?php get_footer(); ?>
