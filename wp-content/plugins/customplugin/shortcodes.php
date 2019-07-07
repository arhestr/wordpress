<?php
/*
Plugin Name: CustomPlugin
Plugin URI: https://google.com
Description: Helpful plugin
Version: 1.0
Author: Good Samaritan
Author URI: https://google.com
*/
function getParentCategories($atts = []) {
    $categories = explode(", ", $atts['category']);
    $dimensions =  ["width"=>231, "height"=>231, "crop"=>1];

    $all_categories = get_categories( ['taxonomy' => 'product_cat'] );
    foreach ($all_categories as $cat) {
        if (in_array($cat->slug, $categories)) {
            if($cat->category_parent == 0) {
                $small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_thumbnail' );
                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                if ( $thumbnail_id ) {
                    $image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
                    $image        = $image[0];
                    $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
                    $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
                } else {
                    $image        = wc_placeholder_img_src();
                    $image_srcset = false;
                    $image_sizes  = false;
                }
                var_dump($image);die();
                if ( $image ) {
                    $image = str_replace( ' ', '%20', $image );
                    if ( $image_srcset && $image_sizes ) {
                        echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'
                            .'<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $cat->name )
                            . '" width="' . esc_attr( $dimensions['width'] ) . '" height="'
                            . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset )
                            . '" sizes="' . esc_attr( $image_sizes ) . '" />'.'</a>';
                    } else {
                        echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $cat->name )
                            . '" width="' . esc_attr( $dimensions['width'] )
                            . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
                    }
                }
                echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
            }
        }
    }
}
add_shortcode( 'getParentCategories', 'getParentCategories' );