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
					<?php if( in_category( 'premium-content' ) &&  ( ! is_user_logged_in() ) ) : ?> 
							<div class="registered-content">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>								
								<p>Você precisa estar registrado para acessar esse conteúdo</p>
								<?php wp_login_form(); ?>
							</div>
						<?php else: ?> 
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php the_content(); ?>	
						<?php endif; ?>
				</div>

		</article><!-- #post-<?php the_ID(); ?> -->
	</main>
<?php endwhile;
