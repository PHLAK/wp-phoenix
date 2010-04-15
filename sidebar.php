<div id="right-nav">
	<div id="sidebar">
		<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()): /* Widgetized sidebar, if you have the plugin installed. */ ?>
			<li>
				<h2>Recent Posts</h2>
				<ul>
					<?php foreach(get_posts('numberposts=10') as $post): ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>

			<li>
				<h2>The Archives</h2>
				<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
					<option value=\"\"><?php echo attribute_escape(__('Select Month')); ?></option>
					<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
				</select>
			</li>
			<li>
				<h2>Post Categories</h2>
				<ul>
				<?php wp_list_categories('show_count=0&title_li='); ?>
				</ul>
			</li>

			<?php wp_list_bookmarks(); ?>

			<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif; ?>
		</ul>
	</div>
</div>