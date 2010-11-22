<?php
/**
 * @package WordPress
 * @subpackage Stacey
 */

get_header(); ?>

<div id="primary">
  <div id="content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <nav id="nav-above">
      <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'themename' ); ?></h1>
      <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
    </nav><!-- #nav-above -->

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
          <?php echo get_avatar( get_the_author_meta('user_email'), '24' ); ?>

          <?php
            printf( __( ' <span class="meta-prep meta-prep-author">Posted</span> <span class="meta-sep">on</span> <a href="%1$s" rel="bookmark"> <time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a>', 'themename' ),
              get_permalink(),
              get_the_date( 'c' ),
              get_the_date()
            );
          ?>
        </div><!-- .entry-meta -->
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
      </div><!-- .entry-content -->

      <footer class="entry-meta">
        <?php printf( 'Filed in %s<br />', get_the_category_list(', ') ); ?>
        <?php
          $tag_list = get_the_tag_list( '', ', ' );
          if ( '' != $tag_list ) {
            $utility_text = __( 'Tagged %2$s', 'themename' );
          } else {
            $utility_text = __( '', 'themename' );
          }
          printf(
            $utility_text,
            get_the_category_list( ', ' ),
            $tag_list,
            get_permalink(),
            the_title_attribute( 'echo=0' )
          );
        ?>

        <?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
      </footer><!-- .entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->

    <nav id="nav-below">
      <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'themename' ); ?></h1>
      <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
    </nav><!-- #nav-below -->

    <?php// comments_template( '', true ); ?>
    <?php comments_template(); ?>

  <?php endwhile; // end of the loop. ?>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
