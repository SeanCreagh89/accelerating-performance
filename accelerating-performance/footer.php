	<footer>
		<div id="primary_footer_bar">
			<?php $i = 0;

			if (is_active_sidebar('contact_details_widget')) { ++$i; }
			if (is_active_sidebar('social_media_widget')) { ++$i; } 
			if (is_active_sidebar('tweets_widget')) { ++$i; } 
			if (is_active_sidebar('contact_form_widget')) { ++$i; }

			if ($i == 1) { /*---If Only One Widget Is Active---*/ ?>

			<div class="full_width">
				<?php if (is_active_sidebar('contact_details_widget')) { dynamic_sidebar('contact_details_widget'); }
				elseif (is_active_sidebar('social_media_widget')) { dynamic_sidebar('social_media_widget'); }
				elseif (is_active_sidebar('tweets_widget')) { dynamic_sidebar('tweets_widget'); }
				elseif (is_active_sidebar('contact_form_widget')) { dynamic_sidebar('contact_form_widget'); } ?>
			</div>

			<?php } elseif ($i == 2) { /*---If Only Two Widgets Are Active---*/
				if (is_active_sidebar('contact_details_widget') && is_active_sidebar('social_media_widget')) { /*---If Contact Details & Social Media---*/ ?>

				<div class="full_width">
					<?php dynamic_sidebar('contact_details_widget'); ?>
					<div class="footer_spacer"></div>
					<?php dynamic_sidebar('social_media_widget'); ?>
				</div>

				<?php } elseif (!is_active_sidebar('contact_details_widget') && is_active_sidebar('social_media_widget')) { /*---If Only Social Media---*/ ?>

				<div class="half_width"><?php dynamic_sidebar('social_media_widget'); ?></div>

				<div class="half_width">
					<?php if (is_active_sidebar('tweets_widget')) {dynamic_sidebar('tweets_widget'); }
					elseif (is_active_sidebar('contact_form_widget')) { dynamic_sidebar('contact_form_widget'); } ?>
				</div>

				<?php } elseif (is_active_sidebar('contact_details_widget') && !is_active_sidebar('social_media_widget')) { /*---If Only Contact Details---*/ ?>

				<div class="half_width"><?php dynamic_sidebar('contact_details_widget'); ?></div>

				<div class="half_width">
					<?php if (is_active_sidebar('tweets_widget')) { dynamic_sidebar('tweets_widget'); }
					elseif (is_active_sidebar('contact_form_widget')) { dynamic_sidebar('contact_form_widget'); } ?>
				</div>

				<?php } elseif (!is_active_sidebar('contact_details_widget') && !is_active_sidebar('social_media_widget')) { /*---If Not Contact Details & Social Media---*/ ?>

				<div class="half_width"><?php dynamic_sidebar('tweets_widget'); ?></div>
				<div class="half_width"><?php dynamic_sidebar('contact_form_widget'); ?></div>

				<?php } ?>
			<?php } elseif ($i == 3) { /*---If Only Three Widgets Are Active---*/
				if (is_active_sidebar('contact_details_widget') && is_active_sidebar('social_media_widget')) { /*---If Contact Details & Social Media---*/ ?>

				<div class="half_width">
					<?php dynamic_sidebar('contact_details_widget'); ?>
					<div class="footer_spacer"></div>
					<?php dynamic_sidebar('social_media_widget'); ?>
				</div>

				<div class="half_width">
					<?php if (is_active_sidebar('tweets_widget')) { dynamic_sidebar('tweets_widget'); }
					elseif (is_active_sidebar('contact_form_widget')) { dynamic_sidebar('contact_form_widget'); } ?>
				</div>

				<?php } else { ?>

				<div class="third_width">
					<?php if (is_active_sidebar('contact_details_widget')) { dynamic_sidebar('contact_details_widget'); }
					elseif (is_active_sidebar('social_media_widget')) { dynamic_sidebar('social_media_widget'); } ?>
				</div>

				<div class="third_width"><?php dynamic_sidebar('tweets_widget'); ?></div>
				<div class="third_width"><?php dynamic_sidebar('contact_form_widget'); ?></div>

				<?php } ?>
			<?php } elseif ($i == 4) { /*---If All Four Widgets Are Active---*/ ?>

			<div class="third_width">
				<?php dynamic_sidebar('contact_details_widget'); ?>
				<div class="footer_spacer"></div>
				<?php dynamic_sidebar('social_media_widget'); ?>
			</div>

			<div class="third_width"><?php dynamic_sidebar('tweets_widget'); ?></div>
			<div class="third_width"><?php dynamic_sidebar('contact_form_widget'); ?></div>

			<?php } ?>
		</div>

		<div id="secondary_footer_bar">
			<?php if (is_active_sidebar('foot_note_widget') && !is_active_sidebar('developer_widget')) { ?>
				&copy;<?php $title = get_bloginfo('name', 'raw'); echo date('Y').' '.$title.'. '; dynamic_sidebar('foot_note_widget'); ?> <a href="http://aspiredigital.ie/">Aspire Digital</a>.
			<?php } elseif (!is_active_sidebar('foot_note_widget') && is_active_sidebar('developer_widget')) { ?>
				&copy;<?php $title = get_bloginfo('name', 'raw'); echo date('Y').' '.$title.'. ';?> All Rights Reserved. <?php dynamic_sidebar('developer_widget'); ?>
			<?php } elseif (is_active_sidebar('foot_note_widget') && is_active_sidebar('developer_widget')) { ?>
				&copy;<?php $title = get_bloginfo('name', 'raw'); echo date('Y').' '.$title.'. '; dynamic_sidebar('foot_note_widget'); dynamic_sidebar('developer_widget'); ?>
			<?php } elseif (!is_active_sidebar('foot_note_widget') && !is_active_sidebar('developer_widget')) { ?>
				&copy;<?php $title = get_bloginfo('name', 'raw'); echo date('Y').' '.$title.'. '; ?> All Rights Reserved. <a href="http://aspiredigital.ie/">Aspire Digital</a>.
			<?php } ?>
		</div>

		<a id="scroll_to_top"><img src="http://localhost:8080/accelerating_performance/wp-content/uploads/2016/11/arrow.png" alt="Arrow Up" /></a>
	</footer>

<?php wp_footer(); ?>
</body>
</html>