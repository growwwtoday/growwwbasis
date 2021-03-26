<?php if ( have_rows( 'contentbuilder' ) ) : ?>
<section class="builder">
        <div class="row">
    <?php while ( have_rows('contentbuilder' ) ) : the_row(); ?>

        <?php if ( get_row_layout() == 'layout01' ) : // textarea ?>
            <div class="col-12 mb-5">
                <?php the_sub_field( 'tekstvlak' ); ?>
            </div>

        <?php elseif ( get_row_layout() == 'layout02' ) : // single img ?>    
            <?php $image = get_sub_field( 'afbeelding' );?>
            <div class="col-12 mb-5">
                <div class="builder-media <?php if ( get_sub_field('video_link') ) : ?>builder-media--video<?php endif;?>">
                    <div class="builder-media__image">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                    </div>
                    <?php if ( get_sub_field('omschrijving') ) : ?>
                    <div class="builder-media__content">
                        <?php the_sub_field( 'omschrijving' ); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( get_sub_field('video_link') ) : ?>
                        <a href="<?php the_sub_field( 'video_link' ); ?>" class="stretched-link"></a>
                    <?php endif; ?>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'layout03' ) : // form ?>   
            <div class="col-12 mb-5">
                <?php gravity_form(get_sub_field( 'formulier' )['id'], false, false, false, '', false );?>
            </div> 

        <?php elseif ( get_row_layout() == 'layout04' ) : // quote ?>    
            <div class="col-12 mb-5">
                <div class="builder-quote">
                    <div class="builder-quote__quote">
                        <p class="lead"><?php the_sub_field( 'quote' );?></p>
                    </div>
                    <div class="builder-quote__quoter">
                        <p><small><?php the_sub_field( 'quoter' );?></small></p>
                    </div>
                </div>
            </div>

        <?php elseif ( get_row_layout() == 'layout05' ) : // buttons ?>    
            <div class="col-12 mb-5">
                <?php if ( have_rows('buttons') ) : $btncount = 0; while( have_rows('buttons') ) : the_row(); $btncount++;?>
                    <a href="<?php the_sub_field('button_link'); ?>" class="btn <?php if($btncount < 2){ ?> btn-primary<?php } else { ?> btn-secondary  mt-2 mt-md-0 ms-0 ms-lg-2  <?php } ?>"><?php the_sub_field('button_tekst'); ?></a>
                <?php endwhile; endif; ?>
            </div>

        <?php elseif ( get_row_layout() == 'layout06' ) : // gallery ?>   
            <div class="col-12 mb-5">
                <div class="builder-slider js-builder-slider">
                    <?php if ( have_rows('afbeeldingen') ) : while( have_rows('afbeeldingen') ) : the_row(); $buildersliderimg = get_sub_field( 'afbeelding' );?>
                        <div class="builder-slider__slide">
                            <img src="<?php echo growwwImage($buildersliderimg['url'],750,750);?>" alt="<?php echo $buildersliderimg['alt']?>">
                        </div>
                        
                    <?php endwhile;endif; ?>
                </div>
            </div>
        <?php elseif ( get_row_layout() == 'layout07' ) : // faq ?>   
            <div class="col-12 mb-5">
                <h2 class="display-3 fw-bold text-secondary mb-5"><?php the_sub_field( 'titel_faq' );?></h2>
                <?php if ( have_rows('faq') ) : while( have_rows('faq') ) : the_row(); ?>
                    <div class="builder-faq-item js-faq">
                        <header class="builder-faq-item__header js-faq-toggle">
                            <span class="builder-faq-item__title"><?php the_sub_field( 'titel' );?></span>
                            <span class="builder-faq-item__toggler"></span>
                        </header>
                        <main class="builder-faq-item__content js-faq-content">
                            <?php the_sub_field( 'omschrijving' );?>
                        </main>
                    </div>
                <?php endwhile;  endif; ?>
              
            </div>

        <?php endif; // end builder ?> 


    <?php endwhile; // end while main builder?>
        </div>
</section>
<?php endif; ?>
