<main>
    <?php
    if (have_posts()): ?>

        <section class="posts-section">
            <?php
            while (have_posts()):
                the_post(); ?>
                
                <?php if ( in_category('premium-content')) : ?>
                <div class="premium-content__container">
                    <?php else: ?>
                            
                <div class="post-container" <?php post_class(); ?>>
                    <?php endif; ?>
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                            <?php the_post_thumbnail('post-thumbnail'); ?>
                        </a>
                    </div>
                    <div class="post-content">
                        <?php the_title(sprintf('<h2 id="post-%s" class="default-max-width" title="%s" ><a class="entry-title" href="%s">', esc_attr(get_the_ID()) ,esc_attr( the_title_attribute('echo=0') ),  esc_url( get_permalink() )), '</a></h2>'); ?>
                        <?php the_excerpt(); ?>
                    </div>    

                </div>

                <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="pagination">' . __('Páginas:', 'textdomain'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'nextpagelink' => __('Próxima página', 'textdomain'),
                        'previouspagelink' => __('Página anterior', 'textdomain'),
                        'separator' => '<span class="separator"> | </span>',
                        'pagelink' => '%',
                        'echo' => 1
                    )
                );
            endwhile; ?>
        </section>

        <nav class="pagination">
            <div class="nav-previous">
                <?php next_posts_link(sprintf(__('%s Posts anteriores'), '<span class="meta-nav">&larr;</span>')); ?>
            </div>

            <div class="nav-next">
                <?php previous_posts_link(sprintf(__('Próxima página %s'), '<span class="meta-nav">&rarr;</span>')); ?>
            </div>

        </nav>
    <?php else:
        get_template_part('template-parts/content/no-content');
    endif;
    ?>

</main>
