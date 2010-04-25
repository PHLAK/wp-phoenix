<div id="comments" class="hentry">
	<?php

	// Do not delete these lines
		if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ('Please do not load this page directly. Thanks!');

		if ( post_password_required() ) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
		<?php
			return;
		}
	?>

	<!-- You can start editing here. -->

	<?php if(have_comments()): ?>
		<h3 id="comments-header"><?php comments_number('No Responses', 'One Response', '% Responses' ); ?> to &#8220;<?php the_title(); ?>&#8221;</h3>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>

		<div class="commentlist">
			<?php foreach ($comments as $comment): ?>
				<div class="comment" id="comment-<?php comment_ID(); ?>">
					<div class="comment-info clearfix">
                        <?php echo get_avatar($comment->comment_author_email, $size = '36'); ?>
                        <div id="comment-author-text" class="clearfix">
						    <strong><?php comment_author_link(); ?></strong>
                            <a href="#comment-<?php comment_ID(); ?>" title="" class="comment-date"><?php comment_date('F j, Y'); ?></a>
                        </div>
                        <?php edit_comment_link('Edit'); ?>
					</div>
					<?php if ($comment->user_id == 1): ?>
						<div class="comment-image-admin"></div>
						<div class="comment-body-admin">
							<?php comment_text(); ?>
						</div>
					<?php else: ?>
						<div class="comment-image"></div>
						<div class="comment-body">
							<?php comment_text(); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	 <?php else : // this is displayed if there are no comments so far ?>
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Comments are closed.</p>
		<?php endif; ?>
	<?php endif; ?>


	<?php if ( comments_open() ) : ?>

		<div class="hr"><hr /></div>

		<div id="respond">

		<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. To log out, <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">click here</a>.</p>

		<?php else : ?>

			<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

			<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

			<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			<label for="url"><small>Website</small></label></p>

		<?php endif; ?>

		<p><textarea name="comment" id="comment" cols="70" rows="10" tabindex="4"></textarea></p>

		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?>
		</p>
		<?php do_action('comment_form', $post->ID); ?>

		</form>

		<?php endif; // If registration required and not logged in ?>
		</div>

	<?php endif; // if you delete this the sky will fall on your head ?>
</div>
