<?php
add_action( 'wp_enqueue_scripts', 'blocksy_child_enqueue_styles' );
function blocksy_child_enqueue_styles() {
    $parenthandle = 'blocksy';
    $theme        = wp_get_theme();
    wp_enqueue_style( $parenthandle,
//        template directory refers to parent
        get_template_directory_uri() . '/style.css',
        array(),  // If the parent theme code has a dependency, copy it to here.
        $theme->parent()->get( 'Version' )
    );
    wp_enqueue_style( 'blocksy-child',
//        stylesheet_directory refers to the active/child theme
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get( 'Version' ) // This only works if you have Version defined in the style header.
    );
}
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style('blocksy-child-style', get_stylesheet_uri());
});