<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

			<div id="entry">
				<h2>Archives by Month:</h2>
				<ul>
					<?php // wp_get_archives('type=monthly'); ?>
					<?php wp_easyarchives(); ?>
				</ul>

				<h2>Archives by Subject:</h2>
				<ul>
					<?php wp_list_categories(); ?>
				</ul>
			</div>

		</div>
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>