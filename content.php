<div class="col-lg-4 col-md-4 col-xs-12">
  <div class="mu-latest-course-single">

    <?php if ( has_post_thumbnail() ) { ?>
      <figure class="mu-latest-course-img">
      <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
    </figure>

    <?php } else { ?>
      <figure class="mu-latest-course-img">
      <a href="#"><img src="http://localhost/aam.web.id/wp-content/uploads/2019/03/artikel.jpg" alt="img"></a>
      </figure>
    <?php } ?>

    <div class="mu-latest-course-single-content">
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <p><?php the_excerpt(); ?></p>
       <div class="mu-latest-course-single-contbottom">
                      <a class="mu-course-details" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
    </div>  
  </div>
</div>