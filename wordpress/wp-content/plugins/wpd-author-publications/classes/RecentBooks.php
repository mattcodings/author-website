<?php

/**
 * Plugin Name: WPD Author Publications
 * Description: Displays recent books
 * Version: 1.0.0
 * Author: Matthew Zwerlein
 * Text Domain: wpd-author-publications
 */

namespace MZ;

if (!defined('MZ_ABPLUGIN_VER'))
    define('MZ_ABPLUGIN_VER', '1.0.0');

// Start up the engine
class RecentBooks
{

    /**
     * Static property to hold our singleton instance
     *
     */
    private static $instance = false;

    /**
     * This is our constructor
     *
     * @return void
     */
    private function __construct()
    {
        add_shortcode('recent-books', [$this, 'recentBooksShortCode']);
    }

    private function __clone()
    {
    }

    /**
     * If an instance exists, this returns it.  If not, it creates one and
     * returns it.
     *
     * @return RecentBooks
     */

    public static function getInstance()
    {
        if (!self::$instance)
//            static::$instance = new static();
            self::$instance = new self;
        return self::$instance;
    }

    public function recentBooksShortCode($attributes)
    {
        $a = shortcode_atts([
            'book_count' => '',
        ], $attributes);
        $recentPosts = new \WP_Query([
            'post_type' => 'book',
            'orderby' => 'publishedDate',

            'posts_per_page' => $a['book_count'],
            'meta_query' => [[
                'key' => 'publishedDate',
            ]]
        ]);

        $output = '<h4 class="shortcode-header">Recent Books</h4><div class="recent-books-container">';

        while ($recentPosts->have_posts()) {
            $recentPosts->the_post();

            $output = $output . '<a href="' . get_the_permalink() . '"><span class="recent-book-title">' . get_the_title() . '</span><div class="recent-books-image">' . get_the_post_thumbnail() . '</div></a><br>';

        }
        $output .= '</div>';
        return $output;
    }
}


