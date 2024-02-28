<?php
use includes\Classes\BookClass\BookClass;
/*
Template Name: List of Books
*/


get_header('template');

?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title">List of Books</h1>
        </header><!-- .page-header -->

        <?php
        $args = array(
            'post_type'      => 'books',  
            'posts_per_page' => -1,       
        );

        $books_query = new WP_Query($args);

        if ($books_query->have_posts()) {
            while ($books_query->have_posts()) {
                $books_query->the_post();

                $book = new BookClass(get_the_ID());

                ?>
                    <div class="book-item col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><a href="<?php echo esc_url( add_query_arg( 'post_id', get_the_ID(), get_permalink( get_page_by_path( 'single-book' ) ) ) ); ?>"><?php echo esc_html( $book->title ); ?></a></h2>
                                <div class="card-text">
                                    <?php echo $book->content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }

            wp_reset_postdata();
        } else {
            echo '<p>No books found.</p>';
        }
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
