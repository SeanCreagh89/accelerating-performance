<?php get_header(); ?>

<div id="content">
	<div id="inner_content_container">
		<?php $page_object = get_queried_object();
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$search = $_GET['s'];
		$category = $page_object->cat_ID;
		$tags = $page_object->slug;

		$args;

		if ($category !== null) { $args = array('s' => $search, 'cat' => $category, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 6, 'paged' => $paged); }
		elseif ($tags !== null) { $args = array('s' => $search, 'tag' => $tags, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 6, 'paged' => $paged); }
		else { $args = array('s' => $search, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 6, 'paged' => $paged); }

		$query = new WP_Query($args);

		if ($query->have_posts()) { ?>

		<div id="post_container">
			<?php $i = 0;

			while($query->have_posts()) : $query->the_post();

			++$i; ?>

			<div class="post_wrapper">
				<div class="post_featured_image_wrapper"><?php the_post_thumbnail(); ?></div>

				<div class="post_title_wrapper">
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<span>written by: <?php the_author(); ?></span>
					</a>
				</div>

				<div class="post_excerpt_wrapper"><?php the_excerpt(); ?></div>

				<?php if($i == 3) { ?><div class="post_spacer"></div><?php }
				if ($i != 6) { ?><div class="responsive_post_spacer"></div><?php } ?>
			</div>

			<?php endwhile; ?>
		</div>

		<?php $pagination = array('total' => $query->max_num_pages, 'current' => $paged, 'mid_size' => 3, 'prev_next' => true, 'type' => 'plain');
		if ($query->max_num_pages > 1) { echo '<div class="pagination_wrapper">'.paginate_links($pagination).'</div>'; }

		} else { echo '<p>Could Not Find Content</p>'; }

		wp_reset_postdata(); ?>
	</div>

	<?php if (is_active_sidebar('sidebar_widget')) { ?><div id="sidebar_container"><?php dynamic_sidebar('sidebar_widget'); ?></div><?php } ?>
</div>

<?php get_footer(); ?>