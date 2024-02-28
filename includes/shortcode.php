<?php

add_shortcode('display_books', 'display_books_shortcode');

function display_books_shortcode($atts) {
    ob_start();

    $template_path = plugin_dir_path(__FILE__) . '../public/templates/list-of-books.php';
    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo 'Template file not found.';
    }

    return ob_get_clean();
}

add_shortcode('display_single_book', 'display_single_book_shortcode');

function display_single_book_shortcode($atts) {

        ob_start();

        $template_path = plugin_dir_path(__FILE__) . '../public/templates/single-book.php';
        if (file_exists($template_path)) {
            include $template_path;
        } else {
            echo 'Template file not found.';
        }

        return ob_get_clean();
}

