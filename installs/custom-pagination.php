<?php

function ava_custom_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pagination = paginate_links(
        [
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, get_query_var('paged') ),
            'type'      => 'list',
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'total'     => $wp_query->max_num_pages
        ]
    );

    if ( $pagination ) {
        $output = "<div class='posts-pagination'><nav class='pagination'>{$pagination}</nav></div>";
        return $output;
    }

    return;
}