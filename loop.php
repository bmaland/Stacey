<?php
/**
 * @package WordPress
 * @subpackage Stacey
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <nav id="nav-above">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'themename' ); ?></h1>
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
  </nav><!-- #nav-above -->
<?php endif; ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

      <div class="entry-meta">
        <?php echo get_avatar( get_the_author_meta('user_email'), '24' ); ?>
        <?php
          printf( __( '<span class="meta-prep meta-prep-author">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a>', 'themename' ),
            get_permalink(),
            get_the_date( 'c' ),
            get_the_date(),
            get_author_posts_url( get_the_author_meta( 'ID' ) )
          );
        ?>
      </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
    <div class="entry-summary">
      <?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php printf( 'Filed in %s<br />', get_the_category_list(', ') ); ?>
      <?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'themename' ) . '</span>', ', ', '' ); ?>
      <!-- <span class="comments-link"><?php// comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ); ?></span> -->
      <?php edit_post_link( __( 'Edit', 'themename' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
    </footer><!-- #entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->

  <?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <nav id="nav-below">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'themename' ); ?></h1>
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
  </nav><!-- #nav-below -->
<?php endif; ?>
