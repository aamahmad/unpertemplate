<?php


// CUSTOME POST Kolaborasi
$args = array(
    'public' => true,
    'publicly_queryable' => true,
    'labels'       => array(
      'name'       => __( 'Kolaborasi' ),
      'add_new'    => __( 'Tambah baru'),
      'add_new_item' => __( 'Tambah Gambar Kolaborasi'),
    ),
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'menu_icon'  => 'dashicons-images-alt2',
    'supports' => array('title')
);
register_post_type('kolaborasi',$args);

// Tambahan isian di custome post type Slider
function kolaborasi_meta_box( $meta_boxes ) {
  $prefix = 'kolaborasi-';

  $meta_boxes[] = array(
    'id' => 'kolaborasi',
    'title' => esc_html__( 'Kolaborasi', 'metabox-online-generator' ),
    'post_types' => array( 'kolaborasi' ),
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => false,
    'fields' => array(
      array(
        'id' => $prefix . 'radio_5',
        'name' => esc_html__( 'Tampilkan', 'metabox-online-generator' ),
        'type' => 'radio',
        'desc' => esc_html__( 'Tampilkan kolaborasi', 'metabox-online-generator' ),
        'placeholder' => '',
        'options' => array(
          1 => 'Tampilkan',
          'Tidak ditampilkan',
        ),
        'inline' => true,
        'std' => '2',
      ),
      array(
        'id' => $prefix . 'image_advanced_bg',
        'type' => 'image_advanced',
        'name' => esc_html__( 'Gambar Slider', 'metabox-online-generator' ),
        'desc' => esc_html__( 'gambar Slider header', 'metabox-online-generator' ),
        'max_file_uploads' => '1',
      ),
      array(
        'id' => $prefix . 'linktujuan',
        'type' => 'text',
        'name' => esc_html__( 'Link Tujuan', 'metabox-online-generator' ),
        'desc' => esc_html__( 'Link Ke Tujuan Konten', 'metabox-online-generator' ),
        'placeholder' => esc_html__( 'http://', 'metabox-online-generator' ),
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'kolaborasi_meta_box' );