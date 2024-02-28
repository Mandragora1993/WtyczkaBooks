<?php 

function custom_post_type_books() {
    $labels = array(
        'name'               => _x( 'Books', 'post type general name', 'textdomain' ),
        'singular_name'      => _x( 'Book', 'post type singular name', 'textdomain' ),
        'menu_name'          => _x( 'Books', 'admin menu', 'textdomain' ),
        'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'textdomain' ),
        'add_new'            => _x( 'Add New', 'book', 'textdomain' ),
        'add_new_item'       => __( 'Add New Book', 'textdomain' ),
        'new_item'           => __( 'New Book', 'textdomain' ),
        'edit_item'          => __( 'Edit Book', 'textdomain' ),
        'view_item'          => __( 'View Book', 'textdomain' ),
        'all_items'          => __( 'List of books', 'textdomain' ),
        'search_items'       => __( 'Search Books', 'textdomain' ),
        'parent_item_colon'  => __( 'Parent Books:', 'textdomain' ),
        'not_found'          => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'books' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'books', $args );
}
add_action( 'init', 'custom_post_type_books' );


function create_acf_fields_for_books() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_books_fields',
            'title' => 'Book fields',
            'fields' => array(
                array(
                    'key' => 'field_author',
                    'label' => 'Author',
                    'name' => 'author',
                    'type' => 'text',
                    'instructions' => 'Insert author name.',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_publish_year',
                    'label' => 'Publish Year',
                    'name' => 'publish_year',
                    'type' => 'number',
                    'instructions' => 'Insert publish year.',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_genre',
                    'label' => 'Genre',
                    'name' => 'genre',
                    'type' => 'select',
                    'instructions' => 'Select genre.',
                    'choices' => array(
                        'fiction' => 'Fiction',
                        'non-fiction' => 'Non-Fiction',
                        'fantasy' => 'Fantasy',
                        'novel' => 'Novel',
                        'horror' => 'Horror',
                        'mystery' => 'Mystery',
                        'crime' => 'Crime',
                        'thriller' => 'Thriller'
                    ),
                    'required' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'books',
                    ),
                ),
            ),
        ));
        
    endif;
}
add_action('acf/init', 'create_acf_fields_for_books');





