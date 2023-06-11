<?php 
get_header(); 

$args = array(
    'post_type'      => 'post',          // Tipo de postagem
    'posts_per_page' => 10,              // Número de posts para exibir
    'category_name'  => 'premium-content',      // Nome da categoria dos posts
    'orderby'        => 'date',          // Ordenar por data
    'order'          => 'DESC',          // Ordem dos mais recente primeiro
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        the_title(); // Exibe o título do post.
        the_excerpt(); // Exibe o resumo.
    }
    wp_reset_postdata(); // Restaura os dados do post original
} else {

    echo 'Nenhum post encontrado.';
}

get_footer(); 