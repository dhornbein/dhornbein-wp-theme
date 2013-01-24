<?php
/**
 * post-stage.php creates the top of a post where media content goes
 * @package dhornbein
 * @since dhornbein 1.0
 */

$post_stage = false;

if ( has_post_thumbnail() ) {
	$post_stage = get_the_post_thumbnail( get_the_ID(), 'stage' );

	$post_excerpt = get_post(get_post_thumbnail_id())->post_excerpt;
} 

if ( $post_stage ):
?>

<div class="entry-stage">
	<a href="<?php the_permalink(); ?>"><?php echo $post_stage ?></a>
	<?php if( $post_excerpt ): ?>
	<div class="entry-stage-desc">
		 <i class="icon-info-sign"></i> <?php echo $post_excerpt ?>
	</div>
	<?php endif; ?>
</div>


<?php 
endif;

unset( $post_excerpt, $post_stage );

?>