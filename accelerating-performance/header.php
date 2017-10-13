<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="Accelerating Performance" />
	<meta name="description" content="Accelerating Performance" />
	<meta name="author" content="Accelerating Performance, Aspire Digital, Sean Creagh" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<?php if (is_active_sidebar('email_top_bar_widget') || is_active_sidebar('mobile_top_bar_widget')) { ?>

		<div id="top_bar">
			<ul>
				<?php if (is_active_sidebar('email_top_bar_widget')) { ?><li><?php dynamic_sidebar('email_top_bar_widget'); ?></li><?php } ?>
				<?php if (is_active_sidebar('email_top_bar_widget') && is_active_sidebar('mobile_top_bar_widget')) { echo '<li style="white-space: pre;">   |   </li>'; } ?>
				<?php if (is_active_sidebar('mobile_top_bar_widget')) { ?><li><?php dynamic_sidebar('mobile_top_bar_widget'); ?></li><?php } ?>
			</ul>
		</div>

		<?php } ?>

		<div id="main_bar" class="navigation">
			<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>

			<div id="site_logo_container"><?php dynamic_sidebar('logo_main_bar_widget'); ?></div>

			<?php } else { ?>

			<div id="site_title_container">
				<div class="title">
					<a href="http://localhost:8080/accelerating_performance/"><?php $title = get_bloginfo('name', 'raw'); echo $title; ?></a>
				</div>
			</div>

			<?php } ?>

			<div id="site_navigation_container" class="navigation_container" style="<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>margin: 61px 0;<?php } else { ?>margin: 35px 0;<?php } ?>"><?php wp_nav_menu(array('theme_location' => 'primary_menu', 'container_class' => 'navigation')); ?></div>

			<div id="site_responsive_navigation" class="responsive_navigation" style="<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>margin: 44px 0;<?php } else { ?>margin: 28px 0;<?php } ?>">
				<?php if (is_active_sidebar('icon_main_bar_widget')) { dynamic_sidebar('icon_main_bar_widget'); }
				else { ?><img src="http://localhost:8080/accelerating_performance/wp-content/uploads/2016/10/mobile-icon-dark-charcoal.png" alt="Mobile Icon" /><?php } ?>
				
				<div id="site_responsive_dropdown" class="responsive_dropdown"><?php wp_nav_menu(array('theme_location' => 'primary_menu', 'container_class' => 'navigation')); ?></div>
			</div>
		</div>

		<div id="hidden_bar" class="navigation">
			<div id="hidden_bar_inner_container">
				<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>

				<div id="site_logo_container"><?php dynamic_sidebar('logo_main_bar_widget'); ?></div>
				
				<?php } else { ?>

				<div id="site_title_container">
					<div class="title">
						<a href="http://localhost:8080/accelerating_performance/"><?php $title = get_bloginfo('name', 'raw'); echo $title; ?></a>
					</div>
				</div>

				<?php } ?>

				<div id="fixed_site_navigation_container" class="navigation_container" style="<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>margin: 31px 0;<?php } else { ?>margin: 5px 0;<?php } ?>"><?php wp_nav_menu(array('theme_location' => 'primary_menu', 'container_class' => 'navigation')); ?></div>

				<div id="fixed_site_responsive_navigation" class="responsive_navigation" style="<?php if (is_active_sidebar('logo_main_bar_widget')) { ?>margin: 16px 0;<?php } ?>">
					<?php if (is_active_sidebar('icon_main_bar_widget')) { dynamic_sidebar('icon_main_bar_widget'); }
					else { ?><img src="http://localhost:8080/accelerating_performance/wp-content/uploads/2016/10/mobile-icon-dark-charcoal.png" alt="Mobile Icon" /><?php } ?>
					
					<div id="fixed_site_responsive_dropdown" class="responsive_dropdown"><?php wp_nav_menu(array('theme_location' => 'primary_menu', 'container_class' => 'navigation')); ?></div>
				</div>
			</div>
		</div>
	</header>