<?php
$tampilkan=get_post_meta(get_the_ID(),'kolaborasi-radio_5',true);
$jenistampilan=get_post_meta(get_the_ID(),'kolaborasi-radio_6',true);

if ( $tampilkan == 1 ) { ?>

 	<?php
    $imagebg = rwmb_meta( 'kolaborasi-image_advanced_bg', array( 'limit' => 1 , 'size' => 'thumbnail' ) );
    $bgimg = reset( $imagebg );
    ?>

	<?php
	if ( $urlbanner=get_post_meta(get_the_ID(),'kolaborasi-linktujuan',true)) { ?>
    <div class="owl-item active" style="width: 131.571px; margin-right: 10px;">
      <div class="client_image">
        	<a href=""><img src="<?php echo $bgimg['full_url']; ?>" alt="<?php the_title(); ?>"></a>
      </div>
    </div>
	<?php } else { ?>
    <div class="owl-item active" style="width: 131.571px; margin-right: 10px; ">
      <div class="client_image">
        	<img src="<?php echo $bgimg['full_url']; ?>" alt="<?php the_title(); ?>">
      </div>
    </div>
	<?php } ?>

<?php } ;?>
