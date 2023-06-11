<?php
get_header();
if ( is_archive() ) {
	get_template_part( 'template-parts/archive' ); 
} else if ( is_single() ){
	get_template_part( 'template-parts/single' );
} else {
	get_404_template();
}

get_footer();
?>
