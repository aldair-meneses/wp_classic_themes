<?php 

// Inicia o loop 
while ( have_posts() ) :
	the_post();?>
    <main class="single__container">
		<article id="post-<?php the_ID(); ?>">
				
			<header class="entry-header alignwide">
				<?php the_post_thumbnail( 'post-thumbnail', 'class=single__featured-image' ); ?>
			</header>

				<div class="entry-content">
					<?php if( in_category( 'premium-content' ) &&  ( ! is_user_logged_in() ) ) :  
						get_template_part( 'template-parts/content/content-single-premium' ) ?>
					<?php else: 
						get_template_part( 'template-parts/content/single' ); ?>
					<?php endif; ?>
				</div>

		</article><!-- #post-<?php the_ID(); ?> -->
	</main>
<?php endwhile;
