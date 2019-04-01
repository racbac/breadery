<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package breadery
 */

if ( ! function_exists( 'breadery_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function breadery_posted_on($icon = FALSE, $update = FALSE) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( $update && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = $icon ? '%2$s%1$s' : '%s';
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( $posted_on, 'post date', 'breadery' ),
			'<a href="' . esc_url( get_month_link(get_the_date('Y'), get_the_date('m')) ) . '" rel="bookmark">' . $time_string . '</a>',
			Breadery_FA_Icons::get_icon_fa('solid', 'clock')
		);
		echo '<span class="entry-date">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'breadery_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function breadery_posted_by($icon = FALSE) {
		$byline = $icon ? '%2$s%1$s' : '%s';
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( $byline, 'post author', 'breadery' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>',
			Breadery_FA_Icons::get_icon_fa('solid', 'user')
		);

		echo '<span class="entry-author">' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if (! function_exists( 'breadery_post_category' ) ) :
	// gets categories
	function breadery_post_category($icon = FALSE) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'breadery' )) ;
			if ( $categories_list) {
				/* translators: 1: list of categories. */
				$print = $icon ? '%2$s%1$s' : "%s";
				printf( '<span class="entry-categories">' . esc_html__( $print, 'breadery' ) . '</span>', $categories_list, Breadery_FA_Icons::get_icon_fa('solid','folder') ); // WPCS: XSS OK.
			}
		}
	}

endif;

if (! function_exists( 'breadery_post_tag' ) ) :
	// gets tags
	function breadery_post_tag() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'breadery' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'breadery' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'breadery_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function breadery_entry_footer() {
		// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		// 	echo '<span class="comments-link">';
		// 	comments_popup_link(
		// 		sprintf(
		// 			wp_kses(
		// 				/* translators: %s: post title */
		// 				__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'breadery' ),
		// 				array(
		// 					'span' => array(
		// 						'class' => array(),
		// 					),
		// 				)
		// 			),
		// 			get_the_title()
		// 		)
		// 	);
		// 	echo '</span>';
		// }

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'breadery' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'breadery_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function breadery_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
				<?php if(get_the_post_thumbnail_caption() != "") : ?>
				<span class="img-caption"><?php the_post_thumbnail_caption(); ?></span>
				<?php endif; ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
				?>
			</a>
			<?php if(get_the_post_thumbnail_caption() != "") : ?>
			<span class="img-caption"><?php the_post_thumbnail_caption(); ?></span>
			<?php endif; ?>
		</div>

		<?php
		endif; // End is_singular().
	}
endif;
