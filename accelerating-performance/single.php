<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : while(have_posts()) : the_post();

	$post_categories = wp_get_post_categories( $post_id );
	$categories = array(); ?>

	<div id="post_featured_image_container">
		<div>
			<?php the_post_thumbnail(); ?>
			<h2><?php the_title(); ?></h2>
		</div>
	</div>

	<div id="post_content_wrapper">
		<div id="post_details_container">
			Author: <?php the_author(); ?><span>  |  </span>

			Categories: <?php $i = 0;

			foreach((get_the_category()) as $category) {
				echo $category->cat_name;
				$counter = count($category);
				if ($counter != 0 && $i < $counter) { echo ', '; }
				++$i;
			} ?><span>  |  </span>

			Tags: <?php $j = 0;

			foreach((wp_get_post_tags($post->ID)) as $tags) {
				echo $tags->name;
				$counter = count($tags);
				if ($counter != 0 && $j < $counter) { echo ', '; }
				++$j;
			} ?><span>  |  </span>

			Date Publish: <?php the_date(); ?><span>  |  </span>
			Last Modified: <?php the_modified_date(); ?>
		</div>

		<div id="post_content_container"><?php the_content(); ?></div>
	</div>

	<?php endwhile;
	else : echo '<p>Could Not Find Content</p>';
	endif; ?>

	<?php if (is_active_sidebar('sidebar_widget')) { ?><div id="sidebar_container"><?php dynamic_sidebar('sidebar_widget'); ?></div><?php } ?>
</div>

<?php get_footer(); ?>