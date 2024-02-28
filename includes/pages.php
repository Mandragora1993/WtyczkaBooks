<?php

use includes\Classes\PageClass\PageClass;

add_action('init', 'custom_books_check_books_page');

function custom_books_check_books_page() {
    $list_of_books_page = new PageClass('books', '[display_books]');
    $list_of_books_page->createPage();

    $single_book_page = new PageClass('single-book', '[display_single_book]');
    $single_book_page->createPage();
}
?>
