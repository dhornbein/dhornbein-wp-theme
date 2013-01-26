<?php
/**
 * @package dhornbein
 * @since dhornbein 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part( 'post', 'stage' ); ?>
	
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'dhornbein' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php dhornbein_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'dhornbein' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'dhornbein' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		
		<?php if ( comments_open() ):  ?>
		<a class="comment-box meta-box mobile-third four columns" href="<?php comments_link(); ?>">
				<div class="meta-box-title"><h5>Comments</h5></div>
				<div class="meta-box-icon">
					<i class="<?php comments_number( 'icon-comment-alt', 'icon-comment', 'icon-comments-alt' ); ?> icon-4x"></i> 
					<i class="icon-plus icon-2x"></i> 
					<span class="meta-box-counter"><?php comments_number('0','1','%') ?></span>
				</div>
		</a>
		<?php else : ?>
		<div class="comment-box meta-box mobile-third four columns">
				<div class="meta-box-title"><h5>Comments Closed</h5></div>
				<div class="meta-box-icon">
					<i class="icon-comment-alt icon-4x"></i> 
					<i class="icon-ban-circle icon-2x"></i>
				</div>
		</div>
		<?php endif; #! comments_open()  ?>

		<div class="general-box meta-box mobile-third four columns">
			<div class="meta-box-title row collapse">
				<h5>
					<div class="left">
						<i class="icon-calendar"></i> <span><span class="hide-for-medium-down"><?php echo get_the_date('l M d, Y ') ?></span><span class="show-for-medium-down"><?php echo get_the_date('D n/j/y ') ?></span> &nbsp;</span>
					</div>
					<div>
						<i class="icon-time"></i> <span><?php echo get_the_time('G:i'); ?><span class="hide-for-medium-down"><?php echo get_the_time(':s'); ?></span> EST</span>
					</div>
				</h5>
			</div>
			<ul class="meta-box-list">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = '<span class="label secondary radius">' . get_the_category_list( __( '</span> <span class="label secondary radius">', 'dhornbein' ) ) . '</span>';
					if ( $categories_list && dhornbein_categorized_blog() ) :
				?>
				<li>
					<span class="meta-box-item-label"><i class="icon-folder-close-alt"></i> <span class="hide-for-small"> <?php printf( __( '<span class="hide-for-small">Category:</span></span> %1$s', 'dhornbein' ), $categories_list ); ?>
				</li>
				<?php endif; // End if categories ?>
			</ul>
		</div>


		<div class="tag-box meta-box mobile-third four columns">
			<div class="meta-box-title"><h5>Tags</h5></div>
			<ul class="meta-box-list">
				<?php the_tags( '<li class="label radius">','</li> <li class="label radius">','</li>' ); ?>
			</ul>
		</div>

	</footer><!-- .entry-meta -->
	<?php edit_post_link( __( 'Edit', 'dhornbein' ), '<span class="edit-link btn tiny radius secondary"><i class="icon-wrench"></i> ', '</span>' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
