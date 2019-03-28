<?php get_header(); ?>

<?php 
wpb_set_post_views(get_the_ID());
if ( have_posts() ) : while ( have_posts() ) : the_post();
wpb_get_post_views(get_the_ID());           
	get_template_part( 'content-single', get_post_format() );
endwhile; endif; 
?>

<?php get_footer(); ?>