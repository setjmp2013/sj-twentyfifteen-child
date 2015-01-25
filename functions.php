<?php

/*
 * Bring in the parent stylesheet as a basis.
 */
add_action('wp_enqueue_scripts', 'sjt15c_enqueue_styles');

function sjt15c_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

/*
 * Add posted-on functionality in pages to keep Google Webmaster Tools happy
 * with this 'hatom' parameter. This is hidden in the stylesheet though but
 * the markup is there for the sake of GoogleBot. The original concern was
 * the homepage, though it impacts all 'page' post types.
 */
function sjt15c_page_entry_meta() {
    if (get_post_type() == 'page') {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), get_the_date(), esc_attr(get_the_modified_date('c')), get_the_modified_date()
        );
        echo '<span class="posted-on">' . $time_string . '</span>' . "\n";
    }
}
