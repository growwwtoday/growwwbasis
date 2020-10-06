<?php if( have_rows('contentbuilder') ): while ( have_rows('contentbuilder') ) : the_row(); ?>
<?php if( get_row_layout() == 'layout01' ):?>
<div class="container my-6">
    <div class="row">
        <div class="col-md-12">
            <?php the_sub_field( 'layout01_tekst' );?>
        </div>
    </div>
</div>


<?php elseif( get_row_layout() == 'layout02' ): ?>
<?php $singleimg = get_sub_field('layout02_afbeelding') ?>
<div class="container my-6">
    <div class="row">
        <div class="col-md-12">
            <?php if(get_sub_field('layout02_video_link')){ ?>
            <a data-fancybox class="stretched-link img-video" href="<?php the_sub_field( 'layout02_video_link' );?>">
                <i class="fal fa-play-circle"></i>
                <?php }else{?>
                <a data-fancybox class="stretched-link" href="<?php echo $singleimg['url']?>">
                    <?php }?>

                    <img class=" img-fluid" src="<?php echo growwwImage($singleimg['url'], 1920, 9999, false);?>"
                        alt="<?php echo $singleimg['alt']?>">
                </a>
        </div>
    </div>
</div>

<?php elseif( get_row_layout() == 'layout03' ): ?>
<div class="container my-6">
    <div class="row align-items-center">
        <div
            class="col-lg-6 col-md-12 mt-2 mt-lg-0 <?php  if( get_sub_field('tekst_links_of_rechts') == 'links' ) {?>order-12 order-lg-1<?php }else {?>order-12 order-lg-12 <?php }?>">
            <h2 class="display-3 mb-3"><?php the_sub_field( 'titel' );?></h2>
            <?php the_sub_field( 'tekst' );?>
            <?php if( have_rows('buttons') ):  $count = 0; while ( have_rows('buttons') ) : the_row(); $count++;?>
            <a class="btn <?php if($count == 2){ ?>mt-2 mt-sm-0 ml-0 ml-xl-1 btn-outline-primary<?php } else { ?>btn-primary<?php }?>"
                href="<?php the_sub_field( 'button_link' );?>"><?php the_sub_field( 'button_tekst' );?></a>
            <?php endwhile; else :endif; ?>
        </div>
        <?php $singleAfb = get_sub_field('afbeelding') ?>
        <div
            class="col-lg-6 col-md-12 <?php  if( get_sub_field('tekst_links_of_rechts') == 'links' ) {?>order-1 order-lg-12  <?php }else {?>order-1 order-lg-1  <?php }?>">
            <?php $afbeelding = get_sub_field('layout02_afbeelding') ?>
            <a data-fancybox class="stretched-link" href="<?php echo $singleAfb['url']?>"></a>
            <img class="img-fluid" src="<?php echo growwwImage($singleAfb['url'], 1920, 9999, false);?>"
                alt="<?php echo $singleimg['alt']?>">
        </div>
    </div>
</div>

<?php elseif( get_row_layout() == 'layout04' ): ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $form = get_sub_field('formulier'); gravity_form($form['id'], true, true, false, '', true, 1); ?>
        </div>
    </div>
</div>

<?php elseif( get_row_layout() == 'layout05' ): ?>
<div class="container my-6">
    <blockquote class="blockquote">
        <p class="mb-0"><?php the_sub_field( 'layout05_quote_tekst' );?></p>
        <?php if(get_sub_field('layout05_naam')){?>
        <footer class="blockquote-footer"><?php the_sub_field( 'layout05_naam' );?></cite></footer>
        <?php }?>
    </blockquote>
</div>

<?php elseif( get_row_layout() == 'layout06' ): ?>
   <div class="col-12 mb-3">
   <h2 class="display-2"><?php the_sub_field('onderwerp');?></h2>
   
   </div>
    <?php if( have_rows('vragen') ): ?> 
                <div class="col-lg-12">
                <?php while ( have_rows('vragen') ) : the_row(); ?>
                    <div class="faq-item js-faq">
                        <header class="faq-item__header js-faq-toggle">
                            <span class="faq-item__title"><?php the_sub_field( 'vraag' );?></span>
                            <span class="faq-item__subtitle"></span>
                            <span class="faq-item__toggler"></span>
                        </header>
                        <main class="faq-item__content js-faq-content">
                        <?php the_sub_field( 'antwoord' );?>
                        </main>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php else : endif; ?>
            
<?php endif; endwhile;else : endif;?>