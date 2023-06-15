<?php
get_header();
if ( is_home() ) {
	get_template_part( 'template-parts/home/intro' );
	get_template_part( 'archive-old' );
	// get_template_part( 'template-parts/content/content' ); 
} else if ( is_singular() ){
	get_template_part( 'template-parts/single' );
} else {
	get_404_template();
}

get_footer();
?>
