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

    <div class="section-website">

      <?php
      $args = array(
      		'category_name' => 'website',
      		'post_per_page' => 10
      );
      $query = new WP_Query( $args );
?>

<?php	if ( $query->have_posts() ) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="entry-header">
          <?php
          if ( is_sticky() && is_home() && ! is_paged() ) {
            printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
          }
          the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
          ?>
        </header><!-- .entry-header -->

        <?php twentynineteen_post_thumbnail(); ?>

        <div class="entry-content">
          <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
          <?php twentynineteen_entry_footer(); ?>
        </footer><!-- .entry-footer -->

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
