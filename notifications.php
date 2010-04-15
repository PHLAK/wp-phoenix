<?php if (is_404()): ?>
	<div class="notice error">
		<p><strong>ERROR 404:</strong> Page not found</p>
	</div>
<?php endif; ?>
<?php if (is_category() || is_day() || is_month() || is_year() || is_search()):	?>
	<div class="notice info">
		<?php if (is_category()): ?>
			<p>You are currently browsing the archives for "<i><?php single_cat_title(''); ?></i>"</p>
		<?php elseif (is_day()): /* If this is a daily archive */  ?>
			<p>You are currently browsing the archives	for the day <?php the_time('l, F jS, Y'); ?>.</p>
		<?php elseif (is_month()): /* If this is a monthly archive */ ?>
			<p>You are currently browsing the archives for the month of <?php the_time('F, Y'); ?>.</p>
		<?php elseif (is_year()): /* If this is a yearly archive */ ?>
			<p>You are currently browsing the archives for the year <?php the_time('Y'); ?>.</p>
		<?php elseif (is_search()): /* If this is search results */  ?>
			<p>Your search results for "<?php the_search_query(); ?>".</p>
		<?php endif; ?>
	</div>
<?php endif; ?>
