<?php

namespace includes\Classes\PageClass;

use includes\Interfaces\IPage\IPage;


class PageClass implements IPage {
    public $title;
    public $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function createPage() {
        $page = get_page_by_path($this->title);

        if (!$page) {
            $new_page = wp_insert_post(array(
                'post_title'    => $this->title,
                'post_content'  => $this->content,
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_type'     => 'page'
            ));
        }
    }
}
?>
