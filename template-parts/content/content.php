<?php

// query_posts( 'category_name=premium-content' );

// while ( have_posts() ): 
//     the_post();
//     var_dump(is_main_query());
// endwhile;
//     wp_reset_query(); 


// while ( have_posts() ): the_post();
//     var_dump(is_main_query());
// endwhile;


// Loop personalizado onde a query (consulta) vai procurar por posts da categoria 'premium-content'.
// Argumentos utilazados para personalizar o loop.


$args = array(
    'post_type' => 'post',
    'category_name' => 'premium-content'
);

// Loop personalizado onde a query (consulta) vai procurar por posts da categoria 'premium-content'.
$custom_loop = new WP_Query($args);
if ($custom_loop->have_posts()) :
    while ($custom_loop->have_posts()) :
        $custom_loop->the_post();
        the_title('<p>', '</p>'); // titulo do post pertecente ao loop personalizado.

    endwhile;
endif;
wp_reset_postdata();

// Loop padrão onde a query (consulta) vai procurar por todos os posts utilizando a query (consulta) padrão.

if (have_posts()) :
    while (have_posts()) :
        the_post();

        the_title('<p>', '</p>'); // titulo do post pertecente ao loop padrão.

    endwhile;
endif;
wp_reset_postdata();
