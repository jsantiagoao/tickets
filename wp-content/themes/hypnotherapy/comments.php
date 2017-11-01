<?php
/**
 * The template to display the Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;



// Callback for output single comment layout
if (!function_exists('hypnotherapy_output_single_comment')) {
	function hypnotherapy_output_single_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) {
			case 'pingback' :
				?>
				<li class="trackback"><?php esc_html_e( 'Trackback:', 'hypnotherapy' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'hypnotherapy' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			case 'trackback' :
				?>
				<li class="pingback"><?php esc_html_e( 'Pingback:', 'hypnotherapy' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'hypnotherapy' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			default :
				$author_id = $comment->user_id;
				$author_link = get_author_posts_url( $author_id );
				$mult = hypnotherapy_get_retina_multiplier();
				?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment_item'); ?>>
					<div class="comment_author_avatar"><?php echo get_avatar( $comment, 70*$mult ); ?></div>
					<div class="comment_content">
						<div class="comment_info">
							<h6 class="comment_author"><?php echo (!empty($author_id) ? '<a href="'.esc_url($author_link).'">' : '') . comment_author() . (!empty($author_id) ? '</a>' : ''); ?></h6>
							<div class="comment_posted">
								<span class="comment_posted_label"><?php esc_html_e('Posted', 'hypnotherapy'); ?></span>
								<span class="comment_date"><?php
									echo hypnotherapy_get_date(get_comment_date('U'));	//get_comment_date(get_option('date_format'));
								?></span>
							</div>
						</div>
						<div class="comment_text_wrap">
							<?php if ( $comment->comment_approved == 0 ) { ?>
							<div class="comment_not_approved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'hypnotherapy' ); ?></div>
							<?php } ?>
							<div class="comment_text"><?php comment_text(); ?></div>
						</div>
						<?php if ($depth < $args['max_depth']) { ?>
							<div class="comment_reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
						<?php } ?>
					</div>
				<?php
				break;
		}
	}
}


// Return template for the single field in the comments
if (!function_exists('hypnotherapy_single_comments_field')) {
	function hypnotherapy_single_comments_field($args) {
		$path_height = $args['form_style'] == 'path' 
							? ($args['field_type'] == 'text' ? 75 : 190)
							: 0;
		return '<div class="comments_field comments_'.esc_attr($args['field_name']).'">'
					. ($args['form_style'] == 'default' 
						? '<label for="comment" class="'.esc_attr($args['field_req'] ? 'required' : 'optional') . '">' . esc_html($args['field_title']) . '</label>'
						: ''
						)
					. '<span class="sc_form_field_wrap">'
						. ($args['field_type']=='text'
							? '<input id="'.esc_attr($args['field_name']).'" name="'.esc_attr($args['field_name']).'" type="text"' . ($args['form_style']=='default' ? ' placeholder="'.esc_attr($args['field_placeholder']) . ($args['field_req'] ? ' *' : '') . '"' : '') . ' value="' . esc_attr($args['field_value']) . '"' . ( $args['field_req'] ? ' aria-required="true"' : '' ) . ' />'
							: '<textarea id="'.esc_attr($args['field_name']).'" name="'.esc_attr($args['field_name']).'"' . ($args['form_style']=='default' ? ' placeholder="'.esc_attr($args['field_placeholder']) . ($args['field_req'] ? ' *' : '') . '"' : '') . ( $args['field_req'] ? ' aria-required="true"' : '' ) . '></textarea>'
							)
						. ($args['form_style']!='default'
							? '<span class="sc_form_field_hover">'
									. ($args['form_style'] == 'path'
										? '<svg class="sc_form_field_graphic" preserveAspectRatio="none" viewBox="0 0 520 ' . intval($path_height) . '" height="100%" width="100%"><path d="m0,0l520,0l0,'.intval($path_height).'l-520,0l0,-'.intval($path_height).'z"></svg>'
										: ''
										)
									. ($args['form_style'] == 'iconed'
										? '<i class="sc_form_field_icon '.esc_attr($args['field_icon']).'"></i>'
										: ''
										)
									. '<span class="sc_form_field_content" data-content="'.esc_attr($args['field_title']).'">'.esc_html($args['field_title']).'</span>'
								. '</span>'
							: ''
							)
					. '</span>'
				. '</div>';
	}
}


// Output comments list
if ( have_comments() || comments_open() ) {
	?>
	<section class="comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
			<h5 class="section_title comments_list_title"><?php $hypnotherapy_post_comments = get_comments_number(); echo esc_html($hypnotherapy_post_comments); ?> <?php echo (1==$hypnotherapy_post_comments ? esc_html__('Comment', 'hypnotherapy') : esc_html__('Comments', 'hypnotherapy')); ?></h5>
			<ul class="comments_list">
				<?php
				wp_list_comments( array('callback'=>'hypnotherapy_output_single_comment') );
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports( get_post_type(), 'comments' ) ) { ?>
				<p class="comments_closed"><?php esc_html_e( 'Comments are closed.', 'hypnotherapy' ); ?></p>
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
		?>
		<div class="comments_form_wrap">
			<div class="comments_form">
				<?php
				$hypnotherapy_form_style = esc_attr(hypnotherapy_get_theme_option('input_hover'));
				if (empty($hypnotherapy_form_style) || hypnotherapy_is_inherit($hypnotherapy_form_style)) $hypnotherapy_form_style = 'default';
				$hypnotherapy_commenter = wp_get_current_commenter();
				$hypnotherapy_req = get_option( 'require_name_email' );
				$hypnotherapy_comments_args = array(
						// class of the 'form' tag
						'class_form' => 'comment-form ' . ($hypnotherapy_form_style != 'default' ? 'sc_input_hover_' . esc_attr($hypnotherapy_form_style) : ''),
						// change the id of send button 
						'id_submit' => 'send_comment',
						// change the title of send button 
						'label_submit' => esc_html__('Submit Comment', 'hypnotherapy'),
						// change the title of the reply section
						'title_reply' => esc_html__('Leave a reply', 'hypnotherapy'),
						'title_reply_before' => '<h5 class="section_title comments_form_title">',
						'title_reply_after' => '</h5>',

						// remove "Logged in as"
						'logged_in_as' => '',
						// remove text before textarea
						'comment_notes_before' => '',
						// remove text after textarea
						'comment_notes_after' => '',
						// redefine your own textarea (the comment body)
						'comment_field' => hypnotherapy_single_comments_field(array(
												'form_style' => $hypnotherapy_form_style,
												'field_type' => 'textarea',
												'field_req' => true,
												'field_icon' => 'icon-feather',
												'field_value' => '',
												'field_name' => 'comment',
												'field_title' => esc_html__('Comment', 'hypnotherapy'),
												'field_placeholder' => esc_html__( 'Your Message', 'hypnotherapy' )
											)),
						'fields' => apply_filters( 'hypnotherapy_filter_comment_form_default_fields', array(
							'author' => hypnotherapy_single_comments_field(array(
												'form_style' => $hypnotherapy_form_style,
												'field_type' => 'text',
												'field_req' => $hypnotherapy_req,
												'field_icon' => 'icon-user',
												'field_value' => isset($hypnotherapy_commenter['comment_author']) ? $hypnotherapy_commenter['comment_author'] : '',
												'field_name' => 'author',
												'field_title' => esc_html__('Name', 'hypnotherapy'),
												'field_placeholder' => esc_html__( 'Your Name', 'hypnotherapy' )
											)),
							'email' => hypnotherapy_single_comments_field(array(
												'form_style' => $hypnotherapy_form_style,
												'field_type' => 'text',
												'field_req' => $hypnotherapy_req,
												'field_icon' => 'icon-mail',
												'field_value' => isset($hypnotherapy_commenter['comment_author_email']) ? $hypnotherapy_commenter['comment_author_email'] : '',
												'field_name' => 'email',
												'field_title' => esc_html__('E-mail', 'hypnotherapy'),
												'field_placeholder' => esc_html__( 'Your E-mail', 'hypnotherapy' )
											))
						) )
				);
			
				comment_form($hypnotherapy_comments_args);
				?>
			</div>
		</div><!-- /.comments_form_wrap -->
		<?php 
	}
	?>
	</section><!-- /.comments_wrap -->
<?php 
}
?>