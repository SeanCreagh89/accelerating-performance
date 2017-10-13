<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : while(have_posts()) : the_post();

	the_content();

	endwhile;
	else : echo '<p>Could Not Find Content</p>';
	endif; ?>
</div>

<?php get_footer(); ?>