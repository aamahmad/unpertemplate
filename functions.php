<?php
// WordPress Titles
add_theme_support( 'title-tag' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );

// logo dinamis
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 55,
        'width'       => 222,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


// MENU
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'menu-link-halaman' => __( 'Menu Link/Halaman'),
      'menu-link-utama' => __( 'Menu Navigasi Utama'),
      'link-footer-sosmed' => __( 'Link Footer Sosmed'),
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

// Menu Link Utama
function create_menu_link_utama( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {


        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {

                $parent = $menu_item->ID;

                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li><a href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {

                   $menu_list .= '<li class="dropdown">' ."\n";
                   $menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">' ."";
                   $menu_list .= '' . $menu_item->title . ' <span class="fa fa-angle-down"></span></a>' ."\n";
                   $menu_list .= '<ul class="dropdown-menu" role="menu">' ."\n";
                   $menu_list .= implode( "", $menu_array );
                   $menu_list .= '</ul>' ."\n";
                   $menu_list .= '</li>' ."\n";

                } else {

                    $menu_list .= '<li><a href="' . $menu_item->url . '" title="' . $menu_item->title . '">' ."";
                    $menu_list .= '' . $menu_item->title . '' ."";
                    $menu_list .= '</a></li>' ."\n";

                }

            }

            // end <li>
        }


    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }

    echo $menu_list;
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 30 );
/*end except*/



/*POPULER POST*/
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
/*ENDPOPULER POST*/
