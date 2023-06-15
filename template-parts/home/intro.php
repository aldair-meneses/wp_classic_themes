<?php 
$custom_text = get_theme_mod( 'custom_text_setting' ); 
$custom_banner = get_theme_mod ( 'custom_banner_setting' );
?>

<section class="home__section">
    <div class="home__cover">
        <?php if ( $custom_banner ): ?>
            <img src="<?php echo esc_url( $custom_banner )?>" alt="">
        <?php endif; ?>
        <?php if ( $custom_text ) : ?>
            <h2 class="entry-title"><?php echo $custom_text?></h2>
        <?php endif; ?>
    </div>

</section>