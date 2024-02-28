<?php
// book-class.php

namespace includes\Classes\BookClass;

use includes\Interfaces\IBook\IBook;


class BookClass implements IBook{
    public $title;
    public $content;
    public $author;
    public $publish_year;
    public $genre;

    public function __construct($post_id) {
        $this->title = get_the_title($post_id);
        $this->content = get_the_content($post_id);
        $this->author = get_field('author', $post_id);
        $this->publish_year = get_field('publish_year', $post_id);
        $this->genre = get_field('genre', $post_id);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublishYear() {
        return $this->publish_year;
    }

    public function getGenre() {
        return $this->genre;
    }
}
?>
