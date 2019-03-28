<div class="col-md-4 col-sm-4">
  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="<?php the_permalink(); ?>">

          <?php if ( has_post_thumbnail() ) { ?>
             <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">

          <?php } else { ?>
            <img src="http://localhost/aam.web.id/wp-content/uploads/2019/03/post.jpg" alt="img">
          <?php } ?>
                      </a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <a href="#">By Admin</a>
                      <a href="#">02 June 2016</a>
                      <span><i class="fa fa-comments-o"></i>87</span>
                    </div>
                    <div class="mu-blog-description">
                      <p><?php the_excerpt(); ?></p>
                      <a class="mu-read-more-btn" href="#">Read More</a>
                    </div>
  </article>
</div>