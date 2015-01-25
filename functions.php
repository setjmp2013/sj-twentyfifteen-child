<?php

add_action('wp_enqueue_scripts', 'sjt15c_enqueue_styles');

function sjt15c_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

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

function twentyfifteen_fonts_url() {
    return '';
}