<?php

namespace includes\Interfaces\IBook;

interface IBook {
    public function getTitle();
    public function getContent();
    public function getAuthor();
    public function getPublishYear();
    public function getGenre();
}
?>
