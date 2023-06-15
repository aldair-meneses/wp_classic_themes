# WordPress - Introdução ao theme basics

## The loop

The loop é um código PHP que o WordPress utiliza para processar cada post na página atual. É utilizado tanto para listar posts com categorias específicas como também posts únicos (single) de acordo com critério específicado no The Loop tags. O The Loop utiliza, por baixo dos panos, a classe `WP_Query` e seus métodos `have_post` e `the_post` para processar os posts do seu site.

É possível mostrar outras informações para cada post utilizando [Template Tags](https://codex.wordpress.org/Template_Tags) apropriadas. Também é possível fazer isso acesando a variavel global "$post" que é definida no post atual enquanto o loop está sendo executado.


### Snippet exemplo do The Loop

No snippet abaixo é mostrado dois exemplos de sintaxe de controle de fluxo do PHP que pode ser para iterar através dos Posts. Essa iteração nada mais é do que o The Loop sendo executado.

> Fluxo de controle tradicional do The Loop WordPress
```php
// O loop começa aqui:
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

// O loop termina aqui:
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Nenhum post correspondente.' ); ?></p>
<?php endif; ?>
```

> Sintaxe de controle de fluxo alternativa do PHP
```php
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		// Template tags de post vem aqui.
		//
	}
}
?>
``` 

## WP_Query

É possível utilizar a classse `WP_Query` para alterar o critério do The Loop. No exemplo abaixo, a estrutura padrão do The Loop é alterada utilizando a variável `$query` que cria um novo objeto The Loop diferente do padrão a partir da instância da classe `WP_Query`. Quando isso acontece, a variável `$query` está armazenando a referência a esse novo loop. Com isso, é possível acessar os métodos da classe `WP_Query` a partir da variável `$query` e personalizar como cada post vai ser processado.

### Snippet de loop personalizado

> Evitando que posts da categoria ID=2 de iterados através do id da categoria.
```php 
<?php
$new_loop = new WP_Query( 'cat=-2' ); // o prefixo '-' está excluindo a categoria de ID 2 do loop.

if ( $new_loop->have_posts() ) {
	while ( $new_loop->have_posts() ) {
		$new_loop->the_post(); 
		//
		// Template tags de post vem aqui.
		//
	}
}
```

> Evitando que posts de multiplas categorias sejam iterados no loop através do nome da categoria.

```php

<?php

$excluded_categories_slugs = 'premium-content, block';
$excluded_categories = array();
$excluded_categories_array = explode(', ', $excluded_categories_slugs);

foreach  ( $excluded_categories_array as $slug ):
    $category = get_category_by_slug($slug);
    if( $category ): 
        $excluded_categories[] = $category->term_id;
    endif;
endforeach;

$new_loop = new WP_Query(
    array( 'category__not_in' => $excluded_categories )
);

while ( $new_loop->have_posts() ):
    $new_loop->the_post();
    the_title('<h2>', '</h2>'); 
endwhile;
```

## Orientação a objetos 

Loops são uma combinação de Orientação a Objetos e Comportamento Global.

As duas variáveis globais mais importantes para loops são.
```$wp_query``` e ```$post```.

### $wp_query

```$wp_query``` é um objeto da classe ```WP_Query``` que possui métodos para consultar posts no banco de dados do WordPress.  
Exemplo: ```$wp_query->posts``` retorna um array individual da classe ```WP_Posts``` onde é gerenciado os posts armazenados pelo banco de dados do WordPress.

### $post

```$post``` é o objeto atual da classe ```WP_Post```.

### have_posts() e the_post()

`have_posts()` e `the_post()` são funções globais que chamam os métodos `$wp_query->have_posts()` e `$wp_query->the_post()` da variável global `$wp_query`.

- `the_post()` não é uma template tag. Não produz saída. `the_post()` é utilizado para mudar o estado das variáveis globais `$post` e `$wp_query`.

- A função global `the_post()` diz ao WordPress para avançar para o próximo post. Alterando `$wp_query->current_post` e então inicializa a variável global `$post` para o próximo post contido no array da variável global `$wp_query->posts`.

## Multiplos loops

É possível criar multiplos loops. Logo abaixo um snippet de código utilizando a classe ```WP_Query``` para criar um loop personlizado junto a uma estrutura de loop padrão utiilizando o objeto global ```$wp_query```.

```php
<?php
	// Argumentos utilazados para personalizar o loop.
	$args = array(
    'post_type' => 'post',
    'category_name' => 'premium-content'
	); 

	// Loop personalizado onde a query (consulta) vai procurar por posts da categoria 'premium-content'.
	$custom_loop = new WP_Query( $args );
	if ( $custom_loop->have_posts() ):
		while ( $custom_loop->have_posts() ):
			$custom_loop->the_post();
			the_title('<p>', '</p>'); // titulo do post pertecente ao loop personalizado
		endwhile;
	endif;
	wp_reset_postdata();

	// Loop padrão onde a query (consulta) vai procurar por todos os posts utilizando a query (consulta) padrão.

	if ( have_posts() ):
		while ( have_posts() ):
			the_post();
			the_title('<p>', '</p>'); // titulo do post pertecente ao loop padrão.
		endwhile;
	endif;
	wp_reset_postdata();
```

### Evitar repetição de posts no loop subsequente

Esse snippet de código é uma forma que pode ser utilizado para evitar a repetição de posts no segundo loop após o primeiro loop ocorrer.

```php
<?php
	$args = array(
        'post_type' => 'post',
        'category_name' => 'premium-content'
    ); 
    
	$iterated_post = array(); // array que vai armazenar o ID dos posts iterados.

	// Loop personalizado onde a query (consulta) vai procurar por posts da categoria 'premium-content'.
	$custom_loop = new WP_Query( $args );
	if ( $custom_loop->have_posts() ):
		while ( $custom_loop->have_posts() ):
			$custom_loop->the_post();
			the_title('<p>', '</p>'); // titulo do post pertecente ao loop personalizado

			$iterated_post[] = get_the_ID();

		endwhile;
	endif;
	wp_reset_postdata();

	// Loop padrão onde a query (consulta) vai procurar por todos os posts utilizando a query (consulta) padrão.

	if ( have_posts() ):
		while ( have_posts() ):
			the_post();

			if ( in_array(get_the_ID(), $iterated_post) ):
				continue; // Se o post já foi iterado no loop anterior, ele vai ser pulado no loop.
			endif;
			the_title('<p>', '</p>'); // titulo do post pertecente ao loop padrão.
		endwhile;
	endif;
	wp_reset_postdata();
```
