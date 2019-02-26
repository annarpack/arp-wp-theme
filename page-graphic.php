<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage AnnaRPack
 *
 *
 */

get_header(); ?>

<section id="primary" class="section-content">

    <div class="section-strategy">

      <?php
      $args = array(
      		'category_name' => 'graphic',
      		'post_per_page' => 10
      );
      $query = new WP_Query( $args );
?>

<?php	if ( $query->have_posts() ) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="box-v">
          <?php twentynineteen_post_thumbnail(); ?>
        </div>
        <div class="entry-content-strategy">
          <?php
          the_title( sprintf( '<h5><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
          ?>
          <?php the_excerpt(); ?>
        <footer class="entry-footer">
        </footer><!-- .entry-footer -->
      </div>
      </article><!-- #post-${ID} -->
    <?php endwhile; ?>
 <!-- end of the loop -->
    <?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
      <?php
    /* Restore original Post Data */
    wp_reset_postdata();
 ?>

    </div>

</section>
