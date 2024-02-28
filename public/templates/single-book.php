<?php
use includes\Classes\BookClass\BookClass;
/*
Template Name: Single Book
*/

require_once get_template_directory() . '/Book.php';


get_header('template');

?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" class="container">

        <?php

        $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;

        if ($post_id) {
            $book = new BookClass(get_the_ID());

            ?>
            <article id="post-<?php echo $post_id; ?>" <?php post_class('card'); ?>>
                <header class="card-header">
                    <h1 class="card-title"><?php echo $book->getTitle(); ?></h1>
                    <div class="entry-meta">
                        <?php
                        if ($book->getAuthor()) {
                            echo '<span class="author">Author: ' . esc_html($book->getAuthor()) . '</span>';
                        }
                        if ($book->getPublishYear()) {
                            echo '<span class="publish-year">Publish Year: ' . esc_html($book->getPublishYear()) . '</span>';
                        }
                        if ($book->getGenre()) {
                            echo '<span class="genre">Genre: ' . esc_html($book->getGenre()) . '</span>';
                        }
                        ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="card-body">
                    <div class="entry-content">
                        <?php echo apply_filters('the_content', $book->getContent()); ?>
                    </div><!-- .entry-content -->
                </div><!-- .card-body -->
            </article><!-- #post-<?php echo $post_id; ?> -->

        <?php } else { ?>
            <p class="alert alert-warning">No valid post ID provided.</p>
        <?php } ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
